/*
+-----------------------------------------------------------------------------+
| jQuery TTabs                                                                |
| This plugin creates a list of tab-labels for the jQuery UI Tabs.            |
| It also calls the jQuery UI Tabs function so you can call just ttabs().     |
|                                                                             |
| @param settings see config for defaults and description                     |
| @autor Martin Jarmar                                                        |
| @url http://martinjarmar.cz/                                                |
+-----------------------------------------------------------------------------+
*/
(function($) {
  $.fn.ttabs = function(settings) {
    var config = {
      'uitabs': {},      // also use ui.tabs() then set the parameters
                         // if false then not use ui.tabs
      'tabarray': false  // array with user tab names
    };
    if (settings)
      $.extend(config, settings);
    this.each(function() {
        var tablist = "<ul>";
        var i = 0;
        $(this).children().each(
          function () {
            tablist += "<li><a href=\"#" + $(this).attr("id") + "\">";
            if (config.tabarray) {
              tablist += config.tabarray[i++];
            }
            else{
              tablist += $(this).children().eq(0).hide().text();
            }
            tablist += "</a></li>";
          }
        );
        tablist += "</ul>";
        $(this).prepend(tablist);
    });
    if (config.uitabs)
      return this.tabs(config.uitabs);
    else
      return this;
  };
})(jQuery);
