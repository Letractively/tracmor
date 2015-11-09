# Summary #

---

The purpose of this enhancement is to allow Tracmor administrators to set custom fields to be required without being forced to enter a default value for the custom field.


### Owner ###

---

  * Name: [Justin Sinclair](http://code.google.com/u/jsinclair/)
  * Name: [Hunter Jensen](http://code.google.com/u/hunterjensen/)


### Current Status ###

---

  * Target Release: Tracmor 0.4.0
  * Last Modified: 2011-03-08
  * Percentage Completed: 0%


# Use Case #

---

Michael is the Tracmor administrator for Dunder Mifflin Paper Co. He uses several custom fields in Tracmor, and often sets these fields to be required because he wants users to enter or select a value for these fields when creating assets and other records in Tracmor. Unfortunately, Tracmor forces Michael to enter a default value for such custom fields, which foils his plan because it allows users to create records without so much as looking at these custom fields. Michael would be really happy if entering a default value was always optional when creating custom fields.

# Implementation #

---

**Admin Module**

The page for creating and editing custom fields (custom\_field\_edit.php) will be updated to no longer require a default value to be entered if the custom field is set as required. Even if an existing custom field is updated from not being required to being required, the user will not need to enter a default value (though they still have the option to).

**Other Modules**

If existing records do not have a value for a required custom field, the user will be required to enter/select a value when editing it. The only exception to this is if a user does not have access to view or edit the required custom field, in which case they will still be allowed to edit the other fields that they do have access to. For example, if there is a required asset custom field called 'Condition', and a user belongs to a user role that does not have view or edit permission for that field, the user will be allowed to create and edit assets without getting an error message that 'Condition' is required.