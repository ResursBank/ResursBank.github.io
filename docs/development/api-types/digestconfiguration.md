---
layout: page
title: digestConfiguration
permalink: /development/api-types/digestconfiguration/
parent: Api Types
grand_parent: Development
---



# digestConfiguration 

Contains elements as defined in the following table.

| Component        | Type                                   | Occurs | Nillable? | Description                                                                                                                       |
|------------------|----------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------------------|
| digestAlgorithm  | **[digestAlgorithm](/development/api-types/digestalgorithm/)** | 1..1   | No        | A digest will be hashed using the specified algorithm. The currently supported algorithms are MD5 and SHA1.                       |
| digestParameters | string                                 | 1..\*  | No        | The digest will be created by hashing one or more parameters. These are the same as those available for specification in the URI. |
| digestSalt       | string                                 | 0..1   | No        | To improve the strength of the hash, a secret hash salt must be provided. The salt will be added after all digest parameters      |

# DigestAlgorithm

| Value | Description |
|-------|-------------|
| MD5   |             |
| SHA1  |             |

