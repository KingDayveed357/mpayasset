$(document).ready(function(){ 
    var userArray, text;

    $(document).on("click", "#banUser", function(){
        userArray = {
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="banned"?"Banned!":"Activated!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'Ban', userArray, status,'');
    })

    $(document).on("click", "#approveReq", function(){
        userArray = {
            'id':$(this).attr('data-id'),
            'userid':$(this).attr('data-uid'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="approve"?"Approved!":"Rejected!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'approveReq', userArray, status,'');
    })

    $(document).on("click", "#verifyAccount", function(){
        userArray = { 
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email')
        }; 
        let status = "Verified!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'verifyAccount', userArray, status,'');
    })

    $(document).on("click", "#verifyKyc", function(){
        userArray = { 
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email')
        }; 
        let status = "Verified!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'verifyKyc', userArray, status,'');
    })

    $(document).on("click", "#declineKyc", function(){
        userArray = { 
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email')
        }; 
        let status = "Decline!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'declineKyc', userArray, status,'');
    })


    $(document).on("click", "#paidReq", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'paidReq', userArray, "Paid!",'');
    })


    $(document).on("click", "#deletePlan", function(){
        userArray = $(this).attr('data-id') 
        text = 'Press yes button to delete...'
        newMagic("Are you sure?", text, 'ajax-success', 'deletePlan', userArray, "Deleted!",'');
    })

    
    $(document).on("click", "#deleteAdd", function(){
        userArray = $(this).attr('data-id') 
        text = 'Press yes button to delete...'
        newMagic("Are you sure?", text, 'ajax-success', 'deleteAdd', userArray, "Deleted!",'');
    })

    $(document).on("click", "#canPayment", function(){
        userArray = $(this).attr('data-id') 
        text = 'Press yes button to cancel...'
        newMagic("Are you sure?", text, 'ajax-success', 'canPayment', userArray, "Cancelled!",'');
    })

    $(document).on("click", "#deleteAddr", function(){
        userArray = $(this).attr('data-id') 
        text = 'Press yes button to delete...'
        newMagic("Are you sure?", text, 'ajax-success', 'deleteAddr', userArray, "Deleted!",'');
    })
    
    $(document).on("click", "#confirmPayment", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to confrim payment...'
        newMagic("Are you sure?", text, 'ajax-success', 'confirmPayment', userArray, "Confirmed!",'');
    })



    $(document).on("click", "#markPaid", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount'),
            "type":$(this).attr('data-type')
        };
        text = 'Press yes button to mark as paid...'
        newMagic("Are you sure?", text, 'ajax-success', 'markPaid', userArray, "Paid!",'');
    })

    $(document).on("click", "#bankPaid", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to mark as paid...'
        newMagic("Are you sure?", text, 'ajax-success', 'bankPaid', userArray, "Paid!",'');
    })

    $(document).on("click", "#canBank", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to confrim payment...'
        newMagic("Are you sure?", text, 'ajax-success', 'canBank', userArray, "Confirmed!",'');
    })

    $(document).on("click", "#canWith", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount'),
            "type":$(this).attr('data-type')
        };
        text = 'Press yes button to confrim payment...'
        newMagic("Are you sure?", text, 'ajax-success', 'canWith', userArray, "Confirmed!",'');
    })

    $(document).on("click", "#revWith", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount'),
            "type":$(this).attr('data-type')
        };
        text = 'Press yes button to confrim payment...'
        newMagic("Are you sure?", text, 'ajax-success', 'revWith', userArray, "Confirmed!",'');
    })

})





