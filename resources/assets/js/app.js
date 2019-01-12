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
            html += '<div class="mb-2 text-center">';
            var line;
            var gurbaniClass;
            var teekaClass;
            var englishClass;
            for (var i = 0; i < result.shabad.length; i++) {
                line = result.shabad[i].line;
                gurbaniClass = settingsData.display.gurmukhi === true ? '' : ' d-none';
                html += '<div class="mb-2">'
                    + '<p '
                    + 'class="gurmukhi-font-2 gurmukhi-text mb-1' + gurbaniClass + '" '
                    + 'style="font-size: ' + settingsData.fontSizes.gurmukhi + 'px" '
                    + '>' + line.gurmukhi.akhar + '</p>';

                if (line.translation.punjabi.default.akhar !== '') {
                    teekaClass = settingsData.display.teeka === true ? '' : ' d-none';
                    html += '<p class="gurmukhi-font-2 teeka-text mb-1' + teekaClass + '" '
                        + 'style="font-size: ' + settingsData.fontSizes.teeka + 'px">' +
                        line.translation.punjabi.default.akhar + '</p>';
                }

                if (line.translation.english.default !== '') {
                    englishClass = settingsData.display.english === true ? '' : ' d-none';
                    html += '<p class="english-text mb-1' + englishClass + '" '
                        + 'style="font-size: ' + settingsData.fontSizes.english + 'px">' +
                        line.translation.english.default + '</p>';
                }

                html += '</div>';
            }
            html += '</div>';
            $('#content').html(html);
            $('#navigation').removeClass('d-none');
        });
    }
};

var defaultSettings = {
    fontSizes: {
        'gurmukhi' : 43,
        'teeka' : 26,
        'english' : 26,
    },
    display: {
        'gurmukhi' : true,
        'teeka' : true,
        'english' : true,
    }
};

var settingsData = defaultSettings;

var settings = {
    readUserPreferences: function() {
        if (localStorage.getItem('settings') !== null) {
            settingsData = JSON.parse(localStorage.getItem('settings'));
        }
    },
    show: function() {
        $('#settings').toggleClass('d-none');
        settings.load();
    },
    load: function() {
        $('#gurmukhi-font-size-setting').val(settingsData.fontSizes.gurmukhi);
        $('#teeka-font-size-setting').val(settingsData.fontSizes.teeka);
        $('#english-font-size-setting').val(settingsData.fontSizes.english);
        $('#teeka-display-setting').prop('checked', settingsData.display.teeka);
        $('#english-display-setting').prop('checked', settingsData.display.english);
    },
    save: function() {
        localStorage.setItem('settings', JSON.stringify(settingsData));
    },
    apply: function() {
        $('.gurmukhi-text').css('fontSize', settingsData.fontSizes.gurmukhi);
        $('.teeka-text').css('fontSize', settingsData.fontSizes.teeka);
        $('.english-text').css('fontSize', settingsData.fontSizes.english);

        if (settingsData.display.teeka) {
            $('.teeka-text').removeClass('d-none');
        } else {
            $('.teeka-text').addClass('d-none');
        }

        if (settingsData.display.english) {
            $('.english-text').removeClass('d-none');
        } else {
            $('.english-text').addClass('d-none');
        }
    },
    increaseFont: function(type) {
        settingsData.fontSizes[type] = parseInt($('#' + type + '-font-size-setting').val()) + 1;
        settings.load();
        settings.apply();
        settings.save();
    },
    descreaseFont: function(type) {
        settingsData.fontSizes[type] = parseInt($('#' + type + '-font-size-setting').val()) - 1;
        settings.load();
        settings.apply();
        settings.save();
    },
    toggleDisplay: function(type) {
        settingsData.display[type] = $('#' + type + '-display-setting').prop('checked');
        settings.load();
        settings.apply();
        settings.save();
    },
    reset: function() {
        if (confirm('Are you sure you want to reset settings? This will load default settings.')) {
            localStorage.removeItem('settings');
            settingsData = defaultSettings;
            settings.load();
            settings.apply();
        }
    }
};

var pothis = {
    list: function() {
        $.get('/pothis', function(response) {
            $('#content').html(response);
        });
    },
}
