$(function() {
    $('.navbar-toggle').click(function() {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);


    });

    $('#search-trigger').click(function() {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
    });

    $(".category_select").select2();
    $(".tag_select").select2({
      placeholder: '請選擇',
			tags: true,
      data: [
    {
      id: '1',
      text: 'aut'
    },
    // ... more data objects ...
  ]
    });

    $(document).on('click', '.btn_tag-edit', function() {
        $(".btn_tag-edit,.btn_tag-delete").attr('disabled', 'disabled');
        $(this).removeAttr('disabled')
            .removeClass("btn-primary")
            .removeClass("btn_tag-edit")
            .addClass("btn-info")
            .addClass("btn_tag-save")
            .find('font')
            .text('儲存');
        var name = $(this).parent()
            .prevAll()
            .eq(1);
        var text = name.text();
        name.text('');
        var input = name.append('<input type="text" class="col-md-12">')
            .find('input')
            .val(text);
    }).on("click", '.btn_tag-save', function(e) {
        $(".btn_tag-edit,.btn_tag-delete").removeAttr('disabled');
        $(this).addClass("btn-primary")
            .addClass("btn_tag-edit")
            .removeClass("btn-info")
            .removeClass("btn_tag-save")
            .find('font')
            .text('編輯');
        var name = $(this).parent()
            .prevAll()
            .eq(1);
        var id = name.parent().attr('id');
        var type = name.parent().attr('type');
        var input = name.find('input');
        var text = input.val();
        var token = input.data('token');
        input.remove();
        name.text(text);
        ajax_submit(type + '/' + id, {
            _method: 'PUT',
            name: text
        });

    }).on('click', '.btn_tag-delete', function() {
        var tr_tag = $(this)
            .parent()
            .parent();
        var id = tr_tag.attr('id');
        var type = tr_tag.attr('type');
        ajax_submit(type + '/' + id, {
            _method: 'delete'
        });
        tr_tag.remove();

    });
});

function ajax_submit(url, data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type: 'post',
        data: data,
        dataType: 'text',
        success: function(msg) {},
        error: function(xhr, ajaxOptions, thrownError) {}
    });
}

function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}
