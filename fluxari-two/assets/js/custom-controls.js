(function(api) {

  api.sectionConstructor['fluxari-upsell'] = api.Section.extend({
      attachEvents: function() {},
      isContextuallyActive: function() {
          return true;
      }
  });

  const fluxari_section_lists = ['banner', 'service'];
  fluxari_section_lists.forEach(fluxari_homepage_scroll);

  function fluxari_homepage_scroll(item) {
      item = item.replace(/-/g, '_');
      wp.customize.section('fluxari_' + item + '_section', function(section) {
          section.expanded.bind(function(isExpanding) {
              wp.customize.previewer.send(item, { expanded: isExpanding });
          });
      });
  }
})(wp.customize);