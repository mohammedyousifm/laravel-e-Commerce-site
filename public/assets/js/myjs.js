
// script for serach in table
$(document).ready(function() {
    $(".search").keyup(function() {
        var searchTerm = $(".search").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {
            'containsi': function(elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                    (match[3] || "").toLowerCase()) >= 0;
            }
        });

        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
            $(this).attr('visible', 'false');
        });

        $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
            $(this).attr('visible', 'true');
        });

        var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');

        if (jobCount == '0') {
            $('.no-result').show();
        } else {
            $('.no-result').hide();
        }
    });
});

//  script for show image in full screen form table
$(document).ready(function() {
 $('.show_image').click(function() {
     // Get the source of the clicked image
     var src = $(this).attr('src');

     // Create a fullscreen container and append the clicked image inside it
     var fullscreenImage = $(
         '<div class="fullscreen"><span class="close-icon">&times;</span><img src="' + src +
         '"></div>');

     // Append the fullscreen container to the body
     $('body').append(fullscreenImage);

     // Add click event to close the fullscreen image
     $('.close-icon').click(function() {
         fullscreenImage.remove(); // Remove the fullscreen container
     });
 });
});

// script for update the project
$(document).ready(function() {
   $(document).on('click' , '.editProject', function() {
      var project = $(this).val();
      $('#showModalToEdite').modal('show');
      $.ajax({
         type: "GET",
         url: "/editProject/" + project,
         success: function(response) {
             $('#proname').val(response.updataproject.project_name);
             $('#prodescription').val(response.updataproject.description);
             $('#prolink').val(response.updataproject.link);
             $('#proimage').attr('src', response.updataproject.image);
             // $('#proimage').val(response.updataproject.image);

         },
         error: function(xhr, status, error) {
             console.error('Error occurred:', error);
         }
      })
   });
});

// script for show the rest of description
$(document).ready(function() {
 $('.description').click(function() {
     $(this).toggleClass('expanded');
 });
});


// add product
$(document).ready(function() {
    $(document).on('click', '.add-product', function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData($('#add_products')[0]); // Serialize form data

        $.ajax({
            type: 'post',
            url: '/dashboard-product',
            data: formData, // Send form data
            contentType: false, // Prevent jQuery from automatically setting content type
            processData: false, // Prevent jQuery from automatically processing the data
            success: function(response) {
                // Handle success response
                if (response.success) {
                    Swal.fire(
                        'Added!',
                        response.message,
                        'success'
                    ).then(() => {
                        // You may want to reload the page or update the UI after deletion
                        location.reload();
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                Swal.fire(
                    'Error!',
                    'Failed to add the product.',
                    'error'
                );
            }
        });
    });
});

// Confirm delete product
$(document).ready(function() {
    $(document).on('click', '.delete-product', function(event) {
        event.preventDefault(); // Prevent default form submission
        var productId = $(this).data('product-id'); // Get the product ID from the button's data attribute

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, perform the deletion
                $.ajax({
                    url: '/dashboard-delete/' + productId + '/products', // Concatenate the product ID to the URL
                    type: 'get',
                    success: function(response) {
                        // Handle success response
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            ).then(() => {
                                // You may want to reload the page or update the UI after deletion
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'Failed to delete the product.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

// add single product
$(document).ready(function() {
    $(document).on('click', '.add-single-product', function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData($('#add_single_products')[0]); // Serialize form data

        $.ajax({
            type: 'post',
            url: '/add-single-product',
            data: formData, // Send form data
            contentType: false, // Prevent jQuery from automatically setting content type
            processData: false, // Prevent jQuery from automatically processing the data
            success: function(response) {
                // Handle success response
                if (response.success) {
                    Swal.fire(
                        'Added!',
                        response.message,
                        'success'
                    ).then(() => {
                        // You may want to reload the page or update the UI after deletion
                        location.reload();
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                Swal.fire(
                    'Error!',
                    'Failed to add the product.',
                    'error'
                );
            }
        });
    });
});

// delete single product
$(document).ready(function() {
    $(document).on('click', '.dele-single-product', function(event) {
        event.preventDefault(); // Prevent default form submission
        var productId = $(this).data('delete-single'); // Get the product ID from the button's data attribute

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, perform the deletion
                $.ajax({
                    url: '/delete-single/' + productId + '/product',
                    type: 'get',
                    success: function(response) {
                        // Handle success response
                        if (response.success) {
                            // Reload the current page
                            location.reload();

                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'Failed to delete the product.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});


// edit single category dit
$(document).ready(function() {
    $(document).on('click', '.edit-single-category', function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData($('#edit_single_category')[0]); // Serialize form data

        $.ajax({
            type: 'post',
            url: '/edit-single-category',
            data: formData, // Send form data
            contentType: false, // Prevent jQuery from automatically setting content type
            processData: false, // Prevent jQuery from automatically processing the data
            success: function(response) {
                // Handle success response
                if (response.success) {
                    Swal.fire(
                        'Added!',
                        response.message,
                        'success'
                    ).then(() => {
                        // You may want to reload the page or update the UI after deletion
                        location.reload();
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                Swal.fire(
                    'Error!',
                    'Failed to add the product.',
                    'error'
                );
            }
        });
    });
});

// edit single category image
$(document).ready(function() {
    $(document).on('click', '.edit-single-category-img', function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData($('#edit_single_category_img')[0]); // Serialize form data

        $.ajax({
            type: 'post',
            url: '/edit-single-category',
            data: formData, // Send form data
            contentType: false, // Prevent jQuery from automatically setting content type
            processData: false, // Prevent jQuery from automatically processing the data
            success: function(response) {
                // Handle success response
                if (response.success) {
                    Swal.fire(
                        'Added!',
                        response.message,
                        'success'
                    ).then(() => {
                        // You may want to reload the page or update the UI after deletion
                        location.reload();
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                Swal.fire(
                    'Error!',
                    'Failed to add the product.',
                    'error'
                );
            }
        });
    });
});




$(document).ready(function() {
    function handleImageUpload(input, preview) {
        input.on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    handleImageUpload($('#main-image-upload'), $('#main-image-preview'));
    handleImageUpload($('#additional-image-upload'), $('#additional-image-preview'));
});


