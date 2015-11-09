### Summary ###

---

Provide the ability to assign parent/child relationships between assets in Tracmor.


### Owner ###

---

  * Name: [Justin Sinclair](http://code.google.com/u/jsinclair/)
  * Name: [Hunter Jensen](http://code.google.com/u/hunterjensen/)


### Current Status ###

---

  * Target Release: Tracmor 0.2.0
  * Last Modified: 2009-04-13
  * Percentage Completed: 100%


### Details ###
  * This feature is complete.


### Use Case ###

---

Amelia uses Tracmor to manage the IT assets (such as computers) at her company. A computer may have components such as a hard drive, memory module, and video card that are also being managed as assets in Tracmor.  Amelia would like to make an association between the computer (parent) and its components (children) within Tracmor so that she knows which components are in each computer. She would also like the option to easily include child assets in transactions that are performed on their parent.

### Implementation ###

---

This feature will allow the user to create parent-child relationships from either the parent or the child asset record.

### Assigning a parent from the child asset ###
A new **Parent Asset** field will be added to asset records.  Users with edit permissions can enter an asset code (or search for an asset using a pop-up search dialog) in this field to assign a parent to the asset.  An asset in Tracmor may have only one parent, but a parent may have multiple children. Child assets may also be parents.

### Assigning children from the parent asset ###
A new section titled **Child Assets** will be added to asset records.  Users with edit permissions will be able to add children using a text input (or search using pop-up search dialog) and **Add** button.  Children will be listed in this section with checkboxes, and users with edit permissions can select one or more children using these checkboxes and perform the following actions on the selected children:

  * **Remove** - The selected asset(s) will no longer be assigned as child to the parent asset
  * **Reassign** - The selected asset(s) will be assigned to a new parent specified by the user by entering the asset code or selecting via pop-up search dialog
  * **Lock** - The selected asset(s) will be locked to the parent asset (see **Locking children to the parent** below below)

### Locking children to the parent ###
When a child is locked to its parent,  it will be automatically included in transactions and audits performed on its parent.  In order to be locked to its parent,  the child asset must be in the same location as the parent asset, and both the parent and the child must not be currently Checked Out, Pending Shipment, Shipped/TBR, or Reserved.

When an asset with locked children is added to a transaction,  the user should be notified of this with a message stating "The following asset(s) have been added to the transaction because they are locked to asset `[Asset Code]`: ... ".  Note that inclusion of locked children should cascade to all locked grandchildren as well (imposing no limit on the levels of nesting allowed).  In the example below, assuming all children are locked to their parent,  adding the Crate to a transaction would notify the user of 11 child assets being added to the transaction:

  * Crate
    * Box
      * Computer
        * Monitor
        * Tower
          * Hard Drive
          * Memory
      * Computer
        * Monitor
        * Tower
          * Hard Drive
          * Memory

When attempting to perform a transaction on an asset with locked children, Tracmor must check that the user has permissions to perform this transaction on all the child asset(s) before allowing the transaction.

### User Experience ###

---

**Mockup #1** - Asset with 1 parent and 1 locked child

![http://tracmor.googlecode.com/svn/wiki/images/ParentChildAssetView.png](http://tracmor.googlecode.com/svn/wiki/images/ParentChildAssetView.png)

**Mockup #2** - Editing asset with 1 parent and 1 locked child

![http://tracmor.googlecode.com/svn/wiki/images/ParentChildAssetEdit.png](http://tracmor.googlecode.com/svn/wiki/images/ParentChildAssetEdit.png)