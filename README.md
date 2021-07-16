# VAULT/SimpleClient

Class wrapper for generalized HTTP client for server-server communications and server-API interactions.

## INSTALLATION and SETUP:

Create a packages folder in the root of your laravel project directory, followed by creating a vault directory:
```~/packages/vault```

Clone this repository into simple_client directory as follows:

```git clone https://github.com/gmlrie001/simple_client.git simple_client```

Once done append to your projects main composer.json file with the following:

```
"repositories": [
  {
    "type": "path",
    "url": "packages/vault/simple_client"
  }
}
```

Finally, run the following composer command to install the package:

```composer require vault/simple_client -o --profile -vvv```

_OR_

```{php_versioned} composer.phar require vault/simple_client -o --profile -vvv```

## USAGE:

  ### Client-side

  ### Server-side

