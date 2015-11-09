# Summary #

---

The purpose of this feature is to allow administrators to assign asset custom fields to certain specific asset models. They will have the ability to assign an asset custom field to All, Some, or None.

# Use Case #

---

Amelia is a Tracmor system administrator for Fictional Co., which has 1,000 asset models. Two of these asset models are Aircards and Computers. All Aircards have a Hexadecimal ESN number, but computers do not. All computers have a brand of Network Adapter, but Aircards do not. Amelia would like to configure Tracmor so that each Aircard in the system can be assigned an ESN #, but not be asked for an Ethernet Card brand. She would also like to assign Network Adapter brand as a custom field for only assets where the asset model is 'computer'.

# Implementation #

---

**Custom Field Edit**

See the functional prototype here - http://tracmorprototype.barefootsolutions.com/asset_model_custom_fields/.

The custom field edit page will be updated with a new interface component. When "Assets" is selected in the "Apply To" multi-select box, the new component will be displayed. When "Assets" is unselected, the new component will disappear.

A new boolean value "Searchable" will be added to all custom fields. This will determine whether the custom field will be included in the advanced search menu for all searches.

The component will include an asset model textbox, add button, and lookup tool (modeled after the asset lookup tool). The administrator will be able to select one or many asset models in the lookup tool and add them to this Custom Field record. The admin will also be able to manually type in asset model codes and click the 'Add'. When clicking the button to "Add Asset Models" in the lookup tool, the datagrid will be updated with those selected asset models. Also included in this component will be a checkbox to select "All Asset Models" and apply this custom field to all asset models.

A datagrid will be displayed to show the asset models that this custom field has been applied to. If the custom field has been applied to "All" using the "Check All" checkbox in the lookup tool, the datagrid will not be displayed but the "All Asset Models" checkbox will be checked.

**Asset Model Edit**

The asset model edit page will be updated with a new field: "Asset Custom Fields". This will be a multi-select checkbox component with all Asset Custom Fields listed. The user can select which asset custom fields will be assigned to this particular asset model.

**Asset Search**

These changes will apply to the QAssetSearchComposite.class.php, and therefore all implementations of asset search throughout the application. All custom fields marked as "searchable" will be included in the "Advanced Search" menu on all asset search pages.

**Asset Edit**

The asset edit page will only display custom fields which have been assigned to this particular asset model. When creating a new asset, these will need to be determined and displayed when the asset model is selected.