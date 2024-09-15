<form id="enquiry">

    <div class="form-group row">

        <div class="col-lg-6">
            <input type="text" name="fname" placeholder="First name" class="form-control" require>
        </div>
<!-- 
        <div class="col-lg-6">
            <input type="text" name="lname" placeholder="Last name" class="form-control" require>
        </div> -->

    </div>

    <div class="form-group row">

        <div class="col-lg-6">
            <input type="text" name="email" placeholder="Email Adders" class="form-control" require>
        </div>
<!-- 
        <div class="col-lg-6">
            <input type="text" name="num" placeholder="Phonne number" class="form-control" require>
        </div> -->

    </div>
<!-- 
    <div class="form-group">
        <textarea name="enquiry" placeholder="Your Enquiry" class="form-control" require></textarea>
    </div> -->

    <div class="form-group">
        <button type="submit" class="btn btn-success" style="">Send your enquiry</button>
    </div>

</form>


<script>

(function($) {
    $('#enquiry').submit(function(event) {

        event.preventDefault(); // It doesn't reload the page on submit

        var endPoint = '<?php echo admin_url('admin-ajax.php');?>'

        var form = $('#enquiry').serialize();

        var formData = new FormData;

        formData.append('action', 'enquiry');
        formData.append('enquiry', form);

        $.ajax(endPoint, {
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            success: function(res) {
                alert(res.data);
            },

            error: function(err) {

            }
        })

    })
})(jQuery)

</script>