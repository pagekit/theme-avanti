<template>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Theme' | trans }}</h2>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>
        </div>
    </div>

    <div class="uk-form uk-form-horizontal">

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Style' | trans }}</span>
            <div class="uk-form-controls">
                <select id="form-styles" class="uk-form-width-large" v-model="config.style">
                    <option value="">{{ 'Default' | trans }}</option>
                    <option value="minimal">{{ 'Minimal' | trans }}</option>
                    <option value="noble">{{ 'Noble' | trans }}</option>
                    <option value="colorful">{{ 'Colorful' | trans }}</option>
                    <option value="urban">{{ 'Urban' | trans }}</option>
                    <option value="modern">{{ 'Modern' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Logo Off-canvas' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input-image :source.sync="config.logo_offcanvas"></input-image>
                <p class="uk-form-help-block">{{ 'Select an optional logo for the off-canvas menu.' | trans }}</p>
            </div>
        </div>


        <div class="uk-form-row">
            <label for="form-navbar-layout" class="uk-form-label">{{ 'Navbar Layout' | trans }}</label>
            <div class="uk-form-controls">
               <select id="form-navbar-layout" class="uk-form-width-large" v-model="config.header_layout">
                   <option value="default">{{ 'Single' | trans }}</option>
                   <option value="centered">{{ 'Centered' | trans }}</option>
               </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-navbar-mode" class="uk-form-label">{{ 'Navbar Mode' | trans }}</label>
            <div class="uk-form-controls">
              <select id="form-navbar-mode" class="uk-form-width-large" v-model="config.header_sticky">
                  <option value="">{{ 'None' | trans }}</option>
                  <option value="sticky">{{ 'Sticky' | trans }}</option>
                  <option value="animated">{{ 'Sticky and animated' | trans }}</option>
              </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-footer-layout" class="uk-form-label">{{ 'Footer' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-footer-layout" class="uk-form-width-large" v-model="config.footer_layout">
                    <option value="default">{{ 'Single' | trans }}</option>
                    <option value="centered">{{ 'Centered' | trans }}</option>
                </select>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="config.footer_fixed"> {{ 'Fixed Footer' | trans }}</label>
                </p>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'To-top Scroller' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="config.totop_scroller"> {{ 'Enable a to-top scroller.' | trans }}</label>
            </div>
        </div>

    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            icon: 'pk-icon-large-brush',
            priority: 15
        },

        data: function () {
            return _.extend({config: {}}, window.$theme);
        },

        events: {

            save: function() {

                this.$http.post('admin/system/settings/config', {name: this.name, config: this.config}).catch(function (res) {
                    this.$notify(res.data, 'danger');
                });

            }

        }

    };

    window.Site.components['site-theme'] = module.exports;

</script>
