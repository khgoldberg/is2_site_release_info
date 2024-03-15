# Example Template

The _IS2 Release Information_ module provides a release information at the site's toolbar if the project contains a **RELEASE.md** file in the project root.


## Table of contents

- Requirements
- Installation
- Configuration


## Requirements (required)

The module requires the following modules:

- [Environment Indicator](https://www.drupal.org/project/environment_indicator)


## Installation

To install this module, follow the below process -

- Add below code in the project's `composer.json` file inside `repositories` section.

```text
"is2_release_info": {
    "type": "package",
    "package": {
        "name": "khgoldberg/is2_site_release_info",
        "version": "1.0.0",
        "type":"drupal-module",
        "source": {
            "url": "https://github.com/khgoldberg/is2_site_release_info.git",
            "type": "git",
            "reference": "main"
        },
        "dist": {
            "url": "https://github.com/khgoldberg/is2_site_release_info/archive/main.zip",
            "type": "zip"
        }
    }
}
```

- Then in the command line execute - `composer require 'khgoldberg/is2_site_release_info:1.0.0'`
- After the module is downloaded, install it via UI or via Drush - `drush en is2_site_release_info -y`.
- This will install the module, and it's dependency the "Environment Indicator".


## Configuration

This module do not need any special configuration. However, the project using this module may copy [Example Release file](EXAMPLE-RELEASE.md) to add release information.
