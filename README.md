# plugin_oxid6_designeditor
A module for changing design features in Oxid
## Installation
- Copy the content into source/modules of the shop installation
- In the composer.json file in the base folder of the shop add the autoload configuration or extend if already existing:
```
"autoload-dev": {
   "psr-4": {
      "FATCHIP\\fcOxidDesignEditor\\": "./source/modules/fc/fcOxidDesignEditor"
   }
},
```
- Connect to the webserver with a console, navigate to the shop base folder and execute the following command:
```
vendor/bin/composer dump-autoload
```

- If your OXID Version >= 6.2, execute the following command
```
vendor/bin/oe-console oe:module:install-configuration source\modules\fc\fcOxidDesignEditor
```

- Log in to the shop admin area go to the module
- Enable the module
## Usage
Location of the Editor: Stammdaten/Master Settings > Design



