# processor-remove-empty-files-and-folders

[![Build Status](https://travis-ci.com/keboola/processor-remove-empty-files-and-folders.svg?branch=master)](https://travis-ci.com/keboola/processor-remove-empty-files-and-folders)

Deletes all empty files and folders. Processes both files (`in/files`) and tables (`in/tables`) inputs.

# Usage


## Parameters

Processor supports these optional parameters:

 - `remove_files_with_whitespace` -- files containing only whitespace characters ([rtrim](https://www.php.net/manual/en/function.rtrim.php)) wil be treated as empty and removed. Default value is false.

## Sample configurations

Default parameters:

```
{  
    "definition": {
        "component": "keboola.processor-remove-empty-files-and-folders"
    }
}
```

### Remove files containing only whitespaces

```
{
    "definition": {
        "component": "keboola.processor-remove-empty-files-and-folders"
    },
    "parameters": {
        "remove_files_with_whitespace": true
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

## License

MIT licensed, see [LICENSE](./LICENSE) file.
