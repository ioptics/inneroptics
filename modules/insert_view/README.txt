OVERVIEW
--------
Merlinofchaos' excellent Views module allows site admins to build dynamic content lists for display on pages and in blocks. It also offers a few handy functions for imbedding view lists in other node bodies. Doing that, though, requires PHP filtering rights for whoever maintains the node. View Tags allows users to embed these lists in node bodies using relatively simple tag syntax:

[view:<name of view>] is replaced by the content listing, and
[view:<name of view>=<number>] limits the listing to a particular <number> of entries.
[view:<name of view>=<number>=<comma-delimited-list>] limits the listing to a particular <number> of entries, and passes a comma delimited list of arguments to the view.


INSTALLATION
------------
Drop it into your modules folder and turn it on. Obviously, it requires the Views module to do its magic.


TODONE
------
Add support for arguments? [view:viewname=5=arg1,arg2,arg3] is one possible syntax...