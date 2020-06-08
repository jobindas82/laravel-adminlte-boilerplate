<div class="modal fade" id="user-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title user-title"></h5>
                <button type="button" class="close modal-close-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="form_data"></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {

        $('#user-modal').on('show.bs.modal', function(e) {

            var id = $(e.relatedTarget).data('id');
            var title = $(e.relatedTarget).data('title');

            $('.user-title').text(title);
            $('#form_data').empty();

            $(this).find('#form_data').load('/user/create?id=' + id, function() {
                $('.select2').select2({
                    theme: 'bootstrap4'
                });

                var submitForm = $('#user-form');
                var validator = submitForm.validate({
                    ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    rules: {
                        name: {
                            required: true,
                            normalizer: function(value) {
                                return $.trim(value);
                            },
                            maxlength: 30
                        },
                        email: {
                            required: true,
                            email: true,
                            maxlength: 40
                        },
                        password: {
                            normalizer: function(value) {
                                return $.trim(value);
                            },
                            required: function(element) {
                                return $('#user_id').val().length == 0;
                            }
                        }
                    },
                    messages: {
                        name: {
                            required: "Please enter full name of user"
                        },
                        email: {
                            required: "Please enter a email address",
                            email: "Please enter a valid email address"
                        },
                        password: {
                            required: "Please enter a strong password"
                        }
                    },
                    invalidHandler: function(form, validator) {
                        $('.submit-validator').removeClass('disabled');
                        return false;
                    }

                });

                submitForm.on('submit', function(e) {
                    e.preventDefault();
                    if ($('.submit-validator').data("executing")) return;
                    if ($(this).valid()) {
                        $('.submit-validator').data("executing", true);
                        $('.submit-validator').addClass('disabled');
                        $.ajax({
                            type: "POST",
                            url: '{{ route("user.save") }}',
                            data: $(this).serialize(),
                            success: function(response) {
                                if (response.message == 'success') {
                                    window.Toast.fire({
                                        icon: 'success',
                                        title: 'User details saved successfully.'
                                    });
                                    $('.modal-close-auto').click();
                                    reloadTable('#users-table');
                                } else {
                                    $('.submit-validator').removeClass('disabled');
                                    $('.submit-validator').removeData("executing");
                                    $.each(response, function(fieldName, fieldErrors) {
                                        window.Toast.fire({
                                            icon: 'error',
                                            title: fieldErrors.toString()
                                        });
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    });
</script>
@endpush