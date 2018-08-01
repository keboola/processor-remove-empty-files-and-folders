# processor-remove-empty-files-and-folders

[![Build Status](https://travis-ci.com/keboola/processor-remove-empty-files-and-folders.svg?branch=master)](https://travis-ci.com/keboola/processor-remove-empty-files-and-folders)

Deletes all empty files and folders.

# Usage

## Sample configurations

Default parameters:

```
{  
    "definition": {
        "component": "keboola.processor-remove-empty-files-and-folders"
    }
}
```

## Development
 
Clone this repository and init the workspace with following command:

```
git clone https://github.com/keboola/processor-vacuum
processor-vacuum
docker-compose build
docker-compose run --rm dev composer install --no-scripts
```

Run the test suite using this command:

```
docker-compose run --rm dev composer tests
```
 
# Integration

For information about deployment and integration with KBC, please refer to the [deployment section of developers documentation](https://developers.keboola.com/extend/component/deployment/) 
