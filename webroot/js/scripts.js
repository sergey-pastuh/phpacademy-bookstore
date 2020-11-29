$(document).ready(function() {
    
    
    $('#more-books').click(function() {
        
        var button = $(this);
        button.text('').addClass('spinner');
        var page = parseInt(button.data('page')); 
        // alert(page);
        var url = '/api/more-books/' + page;
        
        $.get(url)
            .done(function(response) {
                var books = response.data;
                for (var key in books) {
                    var block = $('#book-block-prototype').clone();
                    $('#books-list').append(block);
                    block.removeAttr('id');
                    block.find('.book-title').text(books[key].title);
                    block.find('.book-description').text(books[key].description);
                    block.find('.book-details').attr('href', '/book-' + books[key].id + '.html');
                    block.find('.ajax-add-to-cart').data('book-id', books[key].id);
                    block.show();
                } 
                
                button.data('page', page + 1)
            })
            .fail()
            .always(function() {
                button.text('MORE STUFF').removeClass('spinner');
            })
        ;
        
    });
    
    
    
    
    $(document).on('click', '.ajax-add-to-cart', function(e) {
        e.preventDefault();
        var button = $(this);
        var flashDiv = button.parent().find('div');
        flashDiv.addClass('spinner');
        
        var id = button.data('book-id');
        var url = '/api/cart/add/' + id;
        
        $.get(url)
            .done(function(response) {
                flashDiv.removeClass('spinner');
                flashDiv.text('Book added to cart');
            })
            .fail()
            .always()
        ;
        
    });
 
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        
        var formData = $('#contact-form').serializeArray();
        var postData = {};
        var obj;
        
        for (var key in formData) {
            obj = formData[key];
            postData[obj.name] = obj.value;
        }
        
        function showFlash(message) {
            $('#flash-msg').show().text(message);
        }
        
        // // todo
        // if (postData.username == '' || postData.email == '' || postData.message == '') {
        //     $('#flash-msg').show().text('invalid');   
        //     return;
        // }
        
        // todo: get error message from backend
        $.post('/api/contact-form', postData)
            .always(function(r) {
                showFlash(r['data']);
                $('#contact-form').hide();    
            })
        ;
    });
    
    
    function validate() {
        var username = $('#username').val();
        var email = $('#email').val();
        var message = $('message').val();
        
        var result = username != '' && email != '' && message != '';
       
        return result;
    }
        
});


