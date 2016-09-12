parameterID = 0;
currLocation = "";
url = "";
transferDrawerName = "";

function storeDocument (documentID)
{
    parameterID = documentID;
    currLocation = window.location.href.substr(window.location.href.lastIndexOf('/')+1);
    $('#storeDocModal').modal('show');
}

function confirmStoreDocument (url)
{
    storeDocName = $('#storeDocName').val();
    $.post(
        url+"store_document",
        {
            documentID:parameterID,
            drawerName:storeDocName
        },
        function(data)
        {
            if(data==="ok")
            {
                window.location.href = url+currLocation;
            }
            if(data==="No Drawer Found")
            {
                $('#storeDocModal').modal('hide');
                $('#errNoDrawerFound').modal('show');
            }
        }
    );
}

function transferDocument (documentID)
{
    parameterID = documentID;
    currLocation = window.location.href.substr(window.location.href.lastIndexOf('/')+1);
    $('#transDocModal').modal('show');
}

function confirmTransferDocument (url)
{
    transferDrawerName = $('#transferDrawerName').val();
    $.post(
        url+"transfer_document",
        {
            documentID:parameterID,
            newDrawerName:transferDrawerName
        },
        function(data)
        {
            if(data==="ok")
            {
                window.location.href = url+currLocation;
            }
            if(data==="No Drawer Found")
            {
                $('#transDocModal').modal('hide');
                $('#errNoDrawerFound').modal('show');
            }
        }
    );
}

function deleteDrawer (drawerID)
{
    parameterID = drawerID;
    currLocation = window.location.href.substr(window.location.href.lastIndexOf('/')+1);
    $('#delDrawer').modal('show');
}

function confirmDeleteDrawer (url)
{
    $.post(
        url+"delete_drawer",
        {
            drawerID:parameterID
        },
        function(data)
        {
            if(data==="ok")
            {
                window.location.href = url+currLocation;
            }
        }
    );
}

function deleteDocument(documentID)
{
    parameterID = documentID;
    currLocation = window.location.href.substr(window.location.href.lastIndexOf('/')+1);
    $('#delDocument').modal('show');
}

function confirmDeleteDocument(url)
{
    $.post(
        url+"delete_document",
        {
            docID:parameterID
        },
        function(data)
        {
            if(data==="ok")
            {
                window.location.href = url+currLocation;
            }
        }
    );
}
