### Summary ###

---

Provide the ability to archive assets in Tracmor. Archived assets do not appear in regular search results, and cannot be edited or included in transactions.

### Owner ###

---

  * Name: [Justin Sinclair](http://code.google.com/u/jsinclair/)
  * Name: [Hunter Jensen](http://code.google.com/u/hunterjensen/)


### Current Status ###

---

  * Target Release: TBD
  * Last Modified: 2009-07-22
  * Percentage Completed: 100%


### Details ###
  * This feature is in the design phase.

### Use Case ###

---

Billy Bob uses Tracmor to manage assets.  Over time some of these assets wear out, break, or are just no longer useful.  When this happens, Billy Bob would like to designate these assets as “Archived”,  and have them no longer appear among the other assets when performing transactions or searching for assets.  However, he would still like to see the history of these assets, for example, when viewing past transactions. He would also like a way to search for archived assets specifically.

### Implementation ###

---

This feature will allow the user to archive/unarchive assets from within an asset record,  or from ![http://www.tracmor.com/misc/archive.png](http://www.tracmor.com/misc/archive.png) **Archive** and ![http://www.tracmor.com/misc/unarchive.png](http://www.tracmor.com/misc/unarchive.png) **Unarchive** shortcuts in the Shortcuts bar within the Assets module.

### Archiving & Unarchiving Assets ###
A new "Archive" button will be added to asset records, and will be placed with the other transaction buttons (to the right of the "Ship" button). This button labeling and click action will reflect the state of the asset, so that if the asset is already archived, the button would be labeled "Unarchive" and would trigger an unarchive transaction when clicked. This button will only be visible to users with authorization to perform archiving (as specified in their user role).

When an Archive transaction is performed, the location of the asset will be changed to the new built-in location called "Archived".

When a user is performing an unarchive transaction, the user must select the location of the asset as part of the unarchiving process.  Also,  if using the lookup tool to add assets to an unarchive transaction,  the lookup tool will default to a search on the "Archived" location. (Searching the "Archived" location overrides the "Include Archived" checkbox, so archived assets will always be shown in search results when searching the "Archived" location, regardless of whether the "Include Archived" checkbox is checked).

**Asset Records**

When an asset has been archived, the Edit, Clone, and Attach buttons will be disabled for that asset, but the Delete button will still be available to authorized users. All transactions other than Unarchive will be disabled.

**Asset Searches**

A new Advanced Search filter will be available to include archived assets in Asset searches. This filter will be a checkbox labeled "Include Archived" and will appear after Attachments in Advanced search. This checkbox will be unchecked by default. Archived assets will only appear in search results if this checkbox is checked, or if the "Archived" location is selected. This applies to all asset searches, including those using the lookup tool.  Any archived assets in the search results will have a small 'archived' icon (![http://www.tracmor.com/misc/archive_datagrid.png](http://www.tracmor.com/misc/archive_datagrid.png)) next to the asset code. When this icon is hovered over with the mouse, a hovertip will display the text "Archived by xxxx", where "xxxx" is the name of the user who archived the asset.

**Reports**

Archived assets will be included in the Asset Transaction Report. At this time there will be no option to exclude them.

**Portable Data Terminal**

When performing transactions or audits with a PDT, archived assets will be treated as invalid assets,  handled exactly the same way as if you scanned a bar code that didn't exist in tracmor.

**User Roles**

The Archive/Unarchive transaction will appear under the Transaction Permissions section on User Role records.  Authorization settings for this transaction will work the same way as for the other transactions.