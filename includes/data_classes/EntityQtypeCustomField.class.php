<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
	require(__DATAGEN_CLASSES__ . '/EntityQtypeCustomFieldGen.class.php');

	/**
	 * The EntityQtypeCustomField class defined here contains any
	 * customized code for the EntityQtypeCustomField class in the
	 * Object Relational Model.  It represents the "entity_qtype_custom_field" table 
	 * in the database, and extends from the code generated abstract EntityQtypeCustomFieldGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class EntityQtypeCustomField extends EntityQtypeCustomFieldGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objEntityQtypeCustomField->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('EntityQtypeCustomField Object %s',  $this->intEntityQtypeCustomFieldId);
		}
		
		/**
		 * Load a single EntityQtypeCustomField object,
		 * by EntityQtypeId and CustomFieldId index(es)
		 * This assumes that there is only one object per combination of these two parameters, which is the case but not enforced
		 * @param integer $intEntityQtypeCustomFieldId
		 * @return EntityQtypeCustomField
		*/
		public static function LoadByEntityQtypeIdCustomFieldId($intEntityQtypeId, $intCustomFieldId) {
			return EntityQtypeCustomField::QuerySingle(
				QQ::AndCondition(QQ::Equal(QQN::EntityQtypeCustomField()->EntityQtypeId, $intEntityQtypeId), QQ::Equal(QQN::EntityQtypeCustomField()->CustomFieldId, $intCustomFieldId))
			);
		}
	}
?>