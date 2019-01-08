var gurbaniService = {
    search: function(keyword, callback) {
        jQuery.getJSON('https://api.gurbaninow.com/v2/search/' + keyword + '/?searchtype=1', callback);
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
                    html += '<a class="list-group-item" href="/shabads/' + shabad.id + '">' + shabad.gurmukhi.akhar + '</a>';
                }
                html += '</div>';
            }
            $('#content').html(html);
        });
    }
}
