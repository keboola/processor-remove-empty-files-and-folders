# processor-vacuum

[![Build Status](https://travis-ci.com/keboola/processor-vacuum.svg?branch=master)](https://travis-ci.com/keboola/processor-vacuum)

Deletes all empty files and folders.

# Usage

## Sample configurations

Default parameters:

```
{  
    "definition": {
        "component": "keboola.processor-vacuum"
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
