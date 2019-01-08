var gurbaniService = {
    search: function(keyword, callback) {
        jQuery.getJSON('https://api.gurbaninow.com/v2/search/' + keyword + '/?searchtype=1', callback);
    },
    shabad: function(id, callback) {
        jQuery.getJSON('https://api.gurbaninow.com/v2/shabad/' + id, callback);
    }
};

var search = {
    list: function() {
        gurbaniService.search($('#search-keyword').val(), function(result) {
            $('#content').html('searching ...');
            var html = "";
            if (result.count > 0) {
                html += "<div class='list-group gurmukhi-font-2 mb-2 text-left'>";
                var total = result.count > 20 ? 20 : result.count;
                var shabad;
                for (var i = 0; i < total; i++) {
                    shabad = result.shabads[i].shabad;
                    html += '<a class="list-group-item" href="/shabads/' + shabad.shabadid + '?scripture-id=' + shabad.id + '">' + shabad.gurmukhi.akhar + '</a>';
                }
                html += '</div>';
            }
            $('#content').html(html);
        });
    }
}

var shabad = {
    show: function(id) {
        $('#content').html('loading ...');
        gurbaniService.shabad(id, function(result) {
            var shabadInfo = result.shabadinfo.raag.akhar;
            shabadInfo += ' (AMg ' + result.shabadinfo.pageno + ')';
            $('#shabad-info').html(shabadInfo);

            var html = "";
            html += "<div class='gurmukhi-font-2 mb-2 text-center'>";
            var line;
            for (var i = 0; i < result.shabad.length; i++) {
                line = result.shabad[i].line;

                if (line.translation.punjabi.default.akhar !== '') {
                    html += '<p class="gurmukhi-font-size mb-1">' + line.gurmukhi.akhar + '</p>';
                    html += '<p class="punjabi-font-size mb-3">' + line.translation.punjabi.default.akhar + '</p>';
                } else {
                    html += '<p class="gurmukhi-font-size mb-3">' + line.gurmukhi.akhar + '</p>';
                }
            }
            html += '</div>';
            $('#content').html(html);
            $('#navigation').removeClass('d-none');
        });
    }
};
