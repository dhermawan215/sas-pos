/*! Bootstrap integration for DataTables' StateRestore
 * © SpryMedia Ltd - datatables.net/license
 */

import jQuery from 'jquery';
import DataTable from 'datatables.net-bs';
import StateRestore from 'datatables.net-staterestore';

// Allow reassignment of the $ variable
let $ = jQuery;

$.extend(true, DataTable.StateRestoreCollection.classes, {
    checkBox: 'dtsr-check-box form-check-input',
    creationButton: 'dtsr-creation-button btn btn-default',
    creationForm: 'dtsr-creation-form modal-body',
    creationText: 'dtsr-creation-text modal-header',
    creationTitle: 'dtsr-creation-title modal-title',
    nameInput: 'dtsr-name-input form-control'
});
$.extend(true, DataTable.StateRestore.classes, {
    confirmationButton: 'dtsr-confirmation-button btn btn-default',
    confirmationTitle: 'dtsr-confirmation title modal-header',
    input: 'dtsr-input form-control'
});


export default DataTable;
