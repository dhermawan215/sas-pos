/*! jQuery UI integration for DataTables' AutoFill
 * ©2015 SpryMedia Ltd - datatables.net/license
 */

import jQuery from 'jquery';
import DataTable from 'datatables.net-jqui';
import AutoFill from 'datatables.net-autofill';

// Allow reassignment of the $ variable
let $ = jQuery;


DataTable.AutoFill.classes.btn = 'ui-button ui-state-default ui-corner-all';


export default DataTable;
