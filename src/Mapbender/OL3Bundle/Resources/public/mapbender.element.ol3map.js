(function($){

    $.widget("mapbender.ol3map", {

        _create: function(){
            $(this.element).css('height', '100%');
            var layers = this.prepareLayers();
            this.prepareView(layers);
        },

        prepareView: function(layers) {
            var projection = new ol.proj.Projection({
                code: this.options.srs,
                units: 'm'
            });
            var map = new ol.Map({
                controls: ol.control.defaults().extend([
                    new ol.control.ScaleLine({
                        units: 'metric'
                    })
                ]),
                layers: layers,
                target: this.element[0],
                view: new ol.View({
                    projection: projection,
                    center: this.options.center,
                    extent: this.options.extents.max,
                    zoom: this.options.initialZoom
                })
            });
            return map;
        },

        prepareLayers: function() {
            var layers = [];
            var self = this;
            $.each(this.options.layersets, function(_, set) {
                var cfg = Mapbender.configuration.layersets[set];
                $.each(cfg.reverse(), function(_, service) {
                    $.each(service, function(name, cfg) {
                        var lay = self.prepareLayer(cfg);
                        layers.push(lay);
                    });
                });
            });
            return layers;
        },

        prepareLayer: function(service) {
            var layers = [];
            $.each(service.configuration.children[0].children, function(_, chld) {
                layers.push(chld.options.name);
            });

            return new ol.layer.Tile({
                source: new ol.source.TileWMS({
                    url: service.configuration.options.url,
                    params: {'LAYERS': layers.join(',')},
                    serverType: 'mapserver'
                })
            });
        }
    });

})(jQuery);
