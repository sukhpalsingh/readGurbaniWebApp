var gurbaniService = {
    search: function(keyword, callback) {
        jQuery.getJSON('https://api.gurbaninow.com/v2/search/' + keyword + '/?searchtype=1', callback);
    }
};

var search = {
    list: function() {
        gurbaniService.search($('#search-keyword').val(), function(result) {
            var html = "";
            if (result.count > 0) {
                html += "<ul class='list-group'>";
                var total = result.count > 20 ? 20 : result.count;
                var shabad;
                for (var i = 0; i < total; i++) {
                    shabad = result.shabads[i].shabad;
                    console.log(shabad);
                    html += '<li class="list-group-item">' + shabad.gurmukhi.unicode + '</li>';
                }
                html += '</ul>';
            }
            $('#content').html(html);
        });
    }
}
