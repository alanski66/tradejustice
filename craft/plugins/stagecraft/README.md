# Stagecraft

Stagecraft allows you to import and export [Craft CMS](http://buildwithcraft.com) fields, sections, tags, categories, assets, and globals.. This plugin is built on the bones of XO Digital's [Art Vandelay](https://github.com/xodigital/ArtVandelay) plugin.

## Installation

1. Copy the `stagecraft` directory into your plugins directory
2. Browse to Settings > Plugins in the Craft
3. Click on the Install button next to Stagecraft

## Usage

* Navigate to your plugins in the admin interface and click the 'Stagecraft' link on the left.
* To import data, paste previously exported JSON into the text field and click *Import*.
* To export data, select the field groups you would like to export fields from, the sections you would like to export, then hit *Export*. The exported data will appear in a text field for you to copy.

### Command Line Imports

Make sure you have your latest export saved as `stagecraft.json` in your config folder.

Then just run to import...

```
php craft/app/etc/console/yiic stagecraft
```

For composer-managed projects, check out [craft-console plugin](https://github.com/evolution7/craft-console) for a CLI runner with composer support.
