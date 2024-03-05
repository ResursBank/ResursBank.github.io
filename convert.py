import os
import sys
import shutil
import subprocess
import re
from bs4 import BeautifulSoup

def convert_html_to_md(html_file, output_dir):
    with open(html_file, 'r', encoding="utf-8") as originalHtml:
        content = convert_td_to_th(originalHtml.read())

        with open('/tmp/tmp.html', 'w') as file:
            file.write(content)

    md_file = os.path.join(output_dir, os.path.basename(html_file).replace(".html", ".md"))
    subprocess.run(["pandoc", "/tmp/tmp.html", "-t", "gfm-raw_html", "-o", md_file])
    return md_file

def convert_td_to_th(html_string):
    soup = BeautifulSoup(html_string, 'html.parser')

    # Find all tables in the HTML
    tables = soup.find_all('table')

    # Iterate through each table
    for table in tables:
        # Find the first row (<tr>) in each table
        first_row = table.find('tr')

        if first_row:
            # Find all <td> elements in the first row
            td_elements = first_row.find_all('td')

            # Convert <td> to <th>
            for td in td_elements:
                new_th = soup.new_tag('th')
                new_th.string = td.get_text()
                td.replace_with(new_th)

         # Add <br/> before and after each table
        table.insert_before(soup.new_tag('br'))
        table.insert_after(soup.new_tag('br'))

    # Remove all <br /> tags.
    for table in tables:
        # Find all rows (<tr>) in each table
        rows = table.find_all('tr')

        # Iterate through each row
        for row in rows:
            # Find all cells (<td> or <th>) in each row
            cells = row.find_all(['td', 'th'])

            # Iterate through each cell
            for cell in cells:
                # Find and remove all <br> tags in the cell
                br_tags = cell.find_all('br')
                for br_tag in br_tags:
                    br_tag.extract()

                for ptag in cell.find_all('p'):
                    ptag.unwrap()

                for divTag in cell.find_all('div'):
                    divTag.unwrap()

    for tbody in soup.find_all('tbody'):
        tbody.unwrap()

    for thead in soup.find_all('thead'):
        thead.unwrap()

    for colgroup in soup.find_all('colgroup'):
        colgroup.decompose()

    # Remove breadcrumbs.
    el = soup.find(id="breadcrumb-section")
    if el: el.extract()

    # Remove footer.
    footer = soup.find(id="footer")
    if footer: footer.extract()

    # Remove attachments.
    for el in soup.find_all(class_="pageSection"):
        el.extract()

    # Return the modified HTML string
    return str(soup)

def extract_metadata_from_html(html_file):
    with open(html_file, "r", encoding="utf-8") as f:
        soup = BeautifulSoup(f, "html.parser")

        title = soup.title.text.strip()

        breadcrumbs = [a.text.strip() for a in soup.select("#breadcrumbs li span a")]
        breadcrumbs = [b.lower().replace(" ", "-") for b in breadcrumbs[1:]]
        breadcrumbs = breadcrumbs[1:]
        breadcrumbs = ["".join(c.lower() if c.isalnum() or c == '-' else '-' for c in b) for b in breadcrumbs]

        permalink = "/" + "/".join(breadcrumbs) + "/"

        return title, permalink

def create_jekyll_metadata(title, permalink, md_file):
    md_file_name = os.path.splitext(os.path.basename(md_file))[0]
    md_file_name = md_file_name.split("_", 1)[0].lower()
    permalink = permalink.replace('//', '/')
    title = title.replace(':', '-')
    title = title.replace('Resurs Bank e-Commerce Platform - ', '')
    title = title.lower().title()

    return f"---\nlayout: page\ntitle: {title}\npermalink: {permalink}{md_file_name}/\n---\n\n"

def move_md_to_directory(md_file, output_dir, permalink):
    if not permalink or permalink == '//':
        # If permalink is empty or '/', create the file directly in output_dir
        new_md_file = os.path.join(output_dir, os.path.basename(md_file).split("_", 1)[0].lower() + ".md")
    else:
        # Otherwise, create subdirectories based on permalink
        directory = os.path.join(output_dir, permalink[1:])
        os.makedirs(directory, exist_ok=True)
        new_md_file = os.path.join(directory, os.path.basename(md_file).split("_", 1)[0].lower() + ".md")

    new_md_file = new_md_file.replace(".md.md", ".md")

    shutil.move(md_file, new_md_file)
    return new_md_file

def get_parent_dir_name(directory):
    return os.path.basename(directory.rstrip('/')).replace('-',' ').title()

def process_html_file(html_file, output_dir):
    title, permalink = extract_metadata_from_html(html_file)
    md_file = convert_html_to_md(html_file, output_dir)
    jekyll_metadata = create_jekyll_metadata(title, permalink, md_file)
    with open(md_file, "r+", encoding="utf-8") as f:
        content = f.read()
        content = content.replace('#  Resurs Bank e-Commerce Platform :', '#')
        content = re.sub(r'\n+', "\n", content)

        f.seek(0)
        f.write(jekyll_metadata + content)
        f.truncate()

    new_md_file = move_md_to_directory(md_file, output_dir, permalink)

    print(f"Processed {html_file}. Created {new_md_file}")

def scan_and_update_metadata(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(".md"):
                md_path = os.path.join(root, file)
                directory_name = file.replace('.md', '').replace('.', '-')
                directory_path = os.path.join(root, directory_name)

                if os.path.isdir(directory_path):
                    update_parent_metadata(md_path, directory_path)

def update_parent_metadata(md_path, directory_path):
    with open(md_path, "r+", encoding="utf-8") as file:
        content = file.read()

        dirPath = get_relative_path(md_path).split("/")

        if len(dirPath) < 3 and content.count("---") >= 2 and content.count("has_children: ") == 0:
            content = content.replace("\n---", f"\nhas_children: true\n---\n", 1)
            file.seek(0)
            file.write(content)
            file.truncate()

    for root, dirs, files in os.walk(directory_path):
        for file in files:
            if file.endswith(".md"):
                child_md = os.path.join(root, file)

                with open(child_md, "r+", encoding="utf-8") as childFile:
                    childContent = childFile.read()

                    if childContent.count("---") >= 2:
                        parentPath = os.path.basename(directory_path)
                        parent = parentPath.replace('-', ' ').title()
                        grandChildPath = get_relative_path(child_md).split("/")

                        if (childContent.count("parent:") == 0):
                            childContent = childContent.replace("\n---", f"\nparent: {parent}\n---\n", 1)
                        else:
                            parentPath = grandChildPath[2] if len(grandChildPath) > 2 else grandChildPath[1]

                            childContent = re.sub(r'parent:.*', f"parent: {parentPath.replace('-', ' ').title()}", childContent)

                            if len(grandChildPath) > 2:
                                grandParent = grandChildPath[1].replace('-', ' ').title()

                                if childContent.count("grand_parent:") > 0:
                                    childContent = re.sub(r'grand_parent:.*', f"grand_parent: {grandParent}", childContent)
                                else:
                                    childContent = childContent.replace("\n---", f"\ngrand_parent: {grandParent}\n---\n", 1)
                        childFile.seek(0)
                        childFile.write(childContent)
                        childFile.truncate()

    shutil.move(md_path, os.path.join(directory_path, "index.md"))

def get_relative_path(file):
    root = os.path.abspath(sys.argv[2])
    dir = os.path.abspath(os.path.join(root, os.path.dirname(file)))

    return os.path.relpath(dir, root)

def correct_img_urls(baseDir):
    for root, dirs, files in os.walk(baseDir):
        for file in files:
            filePath = os.path.join(root, file)
            pathPieces = get_relative_path(filePath).split('/')
            relativeAssets = ""

            for path in pathPieces:
                relativeAssets += "../"

            with open(filePath, "r+", encoding="utf-8") as fh:
                content = fh.read()
                content = content.replace("(attachments/", f"({relativeAssets}attachments/")

                fh.seek(0)
                fh.write(content)
                fh.truncate()

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python convert_html_to_md.py input_directory output_directory")
        sys.exit(1)

    input_directory = sys.argv[1]
    output_directory = sys.argv[2]

    html_files = [f for f in os.listdir(input_directory) if f.endswith(".html")]

    for html_file in html_files:
        html_path = os.path.join(input_directory, html_file)
        process_html_file(html_path, output_directory)

    scan_and_update_metadata(output_directory)
    correct_img_urls(output_directory)
