Simple Clean 7.x-2.x (HTML5)
------------------------

The main purpose of the Simple Clean Theme is for it to be simple to get a clean simple site up and running in no time. 

Simple Clean is a two column fixed design (optimized for width 960px). The content column have width 610px and right column (sidebar) have width 260px.


Changes from 7.x-1.x
---------------------------------------
* Mission statement is removed from theme settings. For a mission statement. Place a block in the Region Highlighted with a H1 for mission statement.
* Formating of search results is removed. Use a module like Search Config (http://drupal.org/project/search_config) for more options.


News in HTML5 for 7.x-2.x
-------------------------
* HTML5 doctype and meta content-type
* Header and Footer sections marked up with header and footer elements
* Navigation marked up with nav elements
* HTML5 shim script included for IE compability
* Css3 Mediaqueries script included for css3 compability
* WAI-ARIA accessibility roles added to primary elements
* Nodes marked up with article elements containing header and footer elements
* Blocks marked up with section elements
* Sidebar marked up with aside elements
* Search block form uses the new input type="search" attribute
* Comments marked up as articles with header/footer elements

To-do
-----
* Search page form uses the new input type="search" attribute
* Update more modules to HTML5 markup


Recommended modules
-------------------
* For sub navigation on pages: Menu Block (http://drupal.org/project/menu_block), place a menu block in the Right sidebar with starting level 2nd level (secondary)
* For real names instead of user names in comments or authors of articles: Real Name (http://drupal.org/project/real_name)
* For formating of nodes and placement of fields: Display Suite: (http://drupal.org/project/ds)
* For SEO Urls: Pathauto (with Token) also recommend Transliteration


Quick step-by-step
------------------

Setting up a Drupal site involves several steps. This is some of the steps I usually go through when setting up a Drupal site with Simple Clean Theme:

1. Install Drupal 7.x
2. Install Simple Clean Theme (Put simpleclean-folder in: sites/all/themes)
3. Enable and make Simple Clean default (admin/appearance)
4. Edit theme settings (admin/appearance/settings/simpleclean)
5. Edit site information (admin/config/system/site-information)
6. Add Home to Main menu (admin/structure/menu/manage/main-menu/add)

If you want user pictures or signatures:

1. Enable user pictures and/or signatures (admin/config/people/accounts)
2. For Default picture use: /sites/all/themes/simpleclean/images/no-pic.png
3. Make user pictures in posts and/or user pictures in comments are enabled in theme settings (admin/appearance/settings/simpleclean)

If you want a search engine on your site:

1. Activate search module (admin/modules)
2. Edit search settings (admin/config/search/settings)
3. Set permissions for search module (admin/people/permissions)
4. Run cron to index search (admin/config/system/cron)


Tips & tricks
-------------

* If you install a WYSIWYG editor like CK Editor (http://drupal.org/project/ckeditor). Don't forget to edit the settings for comment text format at (admin/structure/types/manage/article/comment/fields/comment_body)

* To make the code validate (at for example http://validator.nu) you have to unenable the module RDF. At this time it doesn't seem possible to make HTML+RDFa 1.1 validate.


Author's Information
--------------------

Simple Clean is designed and developed by Mattias Axelsson (drupalname: acke) at Happiness Web Agency (www.happiness.se) in the beautiful city Stockholm, Sweden.

Follow me at http://twitter.com/mattiasaxelsson

Enjoy!
