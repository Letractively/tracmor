<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for UserAccountEditFormBase
	require(__FORMBASE_CLASSES__ . '/UserAccountEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the UserAccount class.  It extends from the code-generated
	 * abstract UserAccountEditFormBase class.
	 *
	 * Any display custimizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * Additional qform control objects can also be defined and used here, as well.
	 * 
	 * @package Application
	 * @subpackage FormDraftObjects
	 * 
	 */
	class UserAccountEditForm extends UserAccountEditFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		protected $txtPassword;
		protected $txtPasswordConfirm;
		protected $lblHeaderUser;
		protected $lblUserAccountId;
		protected $pnlPortableAccess;
		
		protected function Form_Create() {
			// Call SetupUserAccount to either Load/Edit Existing or Create New
			$this->SetupUserAccount();
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			$this->txtUsername_Create();
			$this->txtFirstName_Create();
			$this->txtLastName_Create();
			$this->txtPassword_Create();
			$this->txtPasswordConfirm_Create();
			$this->txtEmailAddress_Create();
			$this->chkActiveFlag_Create();
			$this->chkAdminFlag_Create();
			$this->lstRole_Create();
			$this->lblHeaderUser_Create();
			$this->pnlPortableAccess_Create();
			$this->lblUserAccountId_Create();
			$this->txtPortableUserPin_Create();
			$this->chkPortableAccessFlag_Create();
			
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  		
  	}
  	
  	// Create and Setup the Username textbox
  	protected function txtUsername_Create() {
  		parent::txtUsername_Create();
  		$this->txtUsername->CausesValidation = true;
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}
  	
  	// Create and Setup the FirstName textbox
  	protected function txtFirstName_Create() {
  		parent::txtFirstName_Create();
  		$this->txtFirstName->CausesValidation = true;
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}
  	
  	// Create and Setup the LastName textbox
  	protected function txtLastName_Create() {
  		parent::txtLastName_Create();
  		$this->txtLastName->CausesValidation = true;
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}  	
		
		// Create/Setup the password textbox
		protected function txtPassword_Create() {
			
			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Password';
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->CausesValidation = true;
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create/Setup the password confirmation textbox
		protected function txtPasswordConfirm_Create() {
			
			$this->txtPasswordConfirm = new QTextBox($this);
			$this->txtPasswordConfirm->Name = 'Confirm Password';
			$this->txtPasswordConfirm->TextMode = QTextMode::Password;
			$this->txtPasswordConfirm->CausesValidation = true;
			$this->txtPasswordConfirm->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtPasswordConfirm->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
  	// Create and Setup the EmailAddress textbox
  	protected function txtEmailAddress_Create() {
  		parent::txtEmailAddress_Create();
  		$this->txtEmailAddress->CausesValidation = true;
			$this->txtEmailAddress->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtEmailAddress->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}
  	
  	// Create and Setup the Username textbox
  	protected function chkActiveFlag_Create() {
  		parent::chkActiveFlag_Create();
  		$this->chkActiveFlag->CausesValidation = true;
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}  	
  	
  	// Create and Setup the Username textbox
  	protected function chkAdminFlag_Create() {
  		parent::chkAdminFlag_Create();
  		$this->chkAdminFlag->CausesValidation = true;
			$this->chkAdminFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->chkAdminFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}
  	
  	// Setup User Portable Access Flag Checkbox
  	protected function chkPortableAccessFlag_Create() {
  		parent::chkPortableAccessFlag_Create();
  		$this->chkPortableAccessFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
  		$this->chkPortableAccessFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  		$this->chkPortableAccessFlag->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlPortableAccess));
  		$this->chkPortableAccessFlag->AddAction(new QClickEvent(), new QAjaxAction('chkPortableAccessFlag_Click'));
  		
  	}
  	
  	protected function pnlPortableAccess_Create() {
  		$this->pnlPortableAccess = new QPanel($this);
  		$this->pnlPortableAccess->Template = 'pnl_portable_access.inc.php';
  		if (!$this->objUserAccount->PortableAccessFlag) {
  			$this->pnlPortableAccess->Display = false;
  		}
  	}
  	
  	// Setup User Account Id Label
  	protected function lblUserAccountId_Create() {
  		parent::lblUserAccountId_Create();
  		$this->lblUserAccountId->SetParentControl($this->pnlPortableAccess);
  		$this->lblUserAccountId->DisplayStyle = QDisplayStyle::Inline;
  	}
  	
  	// Setup Portable User Pin textbox
  	protected function txtPortableUserPin_Create() {
  		parent::txtPortableUserPin_Create();
  		$this->txtPortableUserPin->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
  		$this->txtPortableUserPin->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  		$this->txtPortableUserPin->SetParentControl($this->pnlPortableAccess);
  		if (QApplication::$TracmorSettings->PortablePinRequired && $this->objUserAccount->PortableAccessFlag) {
  			$this->txtPortableUserPin->Required = true;
  		}
  	}
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}		
		
		// Setup header label
		protected function lblHeaderUser_Create() {
			$this->lblHeaderUser = new QLabel($this);
			$this->lblHeaderUser->Text = ($this->objUserAccount->Username != '') ? $this->objUserAccount->Username : 'New User Account';
		}
		
		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			if ($this->txtPassword->Text != $this->txtPasswordConfirm->Text) {
				$blnError = true;
				$this->txtPassword->Warning = "The passwords do not match, please re-enter.";
				$this->txtPassword->Text = "";
				$this->txtPasswordConfirm->Text = "";
			}
			
			$intUserLimit = (is_numeric(QApplication::$TracmorSettings->UserLimit)) ? QApplication::$TracmorSettings->UserLimit : 99999;			
			
			// Do not allow creation of a new active user if user limit will be exceeded
			if (!$this->blnEditMode && $this->chkActiveFlag->Checked) {
				if (UserAccount::CountActive() >= $intUserLimit) {
					$blnError = true;
					$this->chkActiveFlag->Warning = "You have exceeded your user limit.";
				}
			}
			
			// Do not allow activation of a disabled user if the user limit will be exceeded
			if ($this->blnEditMode && $this->chkActiveFlag->Checked && !$this->objUserAccount->ActiveFlag) {
				if (UserAccount::CountActive() >= $intUserLimit) {
					$blnError = true;
					$this->chkActiveFlag->Warning = "You have exceeded your user limit.";
				}				
			}
			
			if (!$blnError) {
				
				try {
			
					$this->UpdateUserAccountFields();
					$this->objUserAccount->Save();
		
					QApplication::Redirect('user_account_list.php');
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					
					$this->btnCancel->Warning = sprintf('This user account has been updated by another user. You must <a href="user_account_edit.php?intUserAccountId=%s">Refresh</a> to edit this user account.', $this->objUserAccount->UserAccountId);
				}
			}
		}
		
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				$this->objUserAccount->Delete();
				$this->RedirectToListPage();
			}
			catch (QDatabaseExceptionBase $objExc) {
				if ($objExc->ErrorNumber == 1451) {
					$this->btnCancel->Warning = 'This user cannot be deleted because it is associated with one or more entities or transactions.';
				}
				else {
					throw new QDatabaseExceptionBase();
				}
			}
		}
		
		protected function chkPortableAccessFlag_Click($strFormId, $strControlId, $strParameter) {
			if ($this->chkPortableAccessFlag->Checked) {
				$this->txtPortableUserPin->Required = true;
			} else {
				$this->txtPortableUserPin->Required = false;
			}
		}
		
		// Protected Update Methods
		protected function UpdateUserAccountFields() {
			
			$this->objUserAccount->FirstName = $this->txtFirstName->Text;
			$this->objUserAccount->LastName = $this->txtLastName->Text;
			$this->objUserAccount->Username = $this->txtUsername->Text;
			if ($this->txtPassword->Text) {
				$this->objUserAccount->PasswordHash = sha1($this->txtPassword->Text);
			}
			$this->objUserAccount->EmailAddress = $this->txtEmailAddress->Text;
			$this->objUserAccount->ActiveFlag = $this->chkActiveFlag->Checked;
			$this->objUserAccount->AdminFlag = $this->chkAdminFlag->Checked;
			$this->objUserAccount->PortableAccessFlag = $this->chkPortableAccessFlag->Checked;
			$this->objUserAccount->PortableUserPin = $this->txtPortableUserPin->Text;
			$this->objUserAccount->RoleId = $this->lstRole->SelectedValue;
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/user_account_edit.php.inc as the included HTML template file
	UserAccountEditForm::Run('UserAccountEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/user_account_edit.tpl.php');
?>