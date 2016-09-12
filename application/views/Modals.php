<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!-- Modal for Add Document -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "addDocModal" aria-labelledby = "addDocModalLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Add Document </h4>
                </div>
                <div class = "modal-body">
                    <form class = "form-horizontal" method = "POST" action = "<?php echo base_url();?>add_document">
                        <div class = "form-group">
                            <label for = "documentName" class = "col-sm-2 control-label">Name</label>
                            <div class = "col-sm-10">
                                <input type = "text" class = "form-control" id = "documentName" name = "documentName" minlength = "5" maxlength = "128" placeholder = "Document Name (Required)"required/>
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "documentDesc" class = "col-sm-2 control-label">Description</label>
                            <div class = "col-sm-10">
                                <textarea rows = "5" id = "documentDesc" name = "documentDesc" class = "form-control" minlength = "5" maxlength = "1024" placeholder = "Document Description (Required)"required/></textarea>
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "drawerName" class = "col-sm-2 control-label">Drawer</label>
                            <div class = "col-sm-10">
                                <input type = "text" class = "form-control" id = "drawerName" name = "drawerName" minlength = "5" maxlength = "128" placeholder = "(Optional)"/>
                            </div>
                        </div>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal">Cancel</button>
                        <button type = "submit" class = "btn btn-primary"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Add Drawer -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "addDrawerModal" aria-labelledby = "addDrawerModalLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Add Drawer </h4>
                </div>
                <div class = "modal-body">
                    <form class = "form-horizontal" method = "POST" action = "<?php echo base_url();?>add_drawer">
                        <div class = "form-group">
                            <input type = "hidden" value = "<?php echo current_url();?>" name = "currUrl" id = "currUrl">
                            <label for = "drawerName" class = "col-sm-2 control-label"> Name </label>
                            <div class = "col-sm-10">
                                <input type = "text" class = "form-control" id = "drawerName" name = "drawerName" minlength = "5" maxlength = "128" placeholder = "Drawer Name (Required)" required/>
                            </div>
                        </div>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Cancel </button>
                        <button type = "submit" class = "btn btn-primary"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Document -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "delDocument" aria-labelledby = "delDocumentLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Delete Document </h4>
                </div>
                <div class = "modal-body">
                    <p> Are you sure you want to delete this document? </p>
                    <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Cancel</button>
                    <button type = "button" class = "btn btn-danger" data-dismiss = "modal" onclick = "confirmDeleteDocument('<?php echo base_url();?>');">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Drawer -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "delDrawer" aria-labelledby = "delDrawerLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Remove Drawer </h4>
                </div>
                <div class = "modal-body">
                    <p> Are you sure you want to delete this drawer? </p>
                    <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Cancel</button>
                    <button type = "button" class = "btn btn-danger" data-dismiss = "modal" onclick = "confirmDeleteDrawer('<?php echo base_url();?>');">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Transfer Document -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "transDocModal" aria-labelledby = "transDocModalLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Transfer Document Location </h4>
                </div>
                <div class = "modal-body">
                    <div class = "form-horizontal">
                        <div class = "form-group">
                            <label for = "drawerName" class = "col-sm-2 control-label"> New Location </label>
                            <div class = "col-sm-10">
                                <input type = "text" class = "form-control" id = "transferDrawerName" name = "transferDrawerName" minlength = "5" maxlength = "128" placeholder = "Drawer Name (Required)" required/>
                            </div>
                        </div>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Cancel </button>
                        <button type = "button" class = "btn btn-primary" onclick = "confirmTransferDocument('<?php echo base_url();?>')"> Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Store Document -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "storeDocModal" aria-labelledby = "storeDocModalLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Store Document </h4>
                </div>
                <div class = "modal-body">
                    <div class = "form-horizontal">
                        <div class = "form-group">
                            <label for = "drawerName" class = "col-sm-2 control-label"> New Location </label>
                            <div class = "col-sm-10">
                                <input type = "text" class = "form-control" id = "storeDocName" name = "storeDocName" minlength = "5" maxlength = "128" placeholder = "Drawer Name (Required)" required/>
                            </div>
                        </div>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Cancel </button>
                        <button type = "button" class = "btn btn-primary" onclick = "confirmStoreDocument('<?php echo base_url();?>')"> Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal for 'No Drawer Found' -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "errNoDrawerFound" aria-labelledby = "errNoDrawerFoundLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> No Drawer Found </h4>
                </div>
                <div class = "modal-body">
                    <p> Drawer Not Found </p>
                    <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal for 'Invalid search' -->
    <div class = "modal fade" tabindex = "-1" role = "dialog" id = "errInvalidSearch" aria-labelledby = "errInvalidSearchLabel">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
                    <h4 class = "modal-title"> Invalid Search String </h4>
                </div>
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Close</button>
                </div>
            </div>
        </div>
    </div>
