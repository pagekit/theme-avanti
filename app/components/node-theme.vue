<template>

    <div class="uk-form-horizontal">

        <template v-if="node.type === 'page'">
            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Title' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.title_hide"> {{ 'Hide Title' | trans }}</label>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Title Size' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.title_large"> {{ 'Extra large title.' | trans }}</label>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Alignment' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.alignment"> {{ 'Center the title and content.' | trans }}</label>
                </div>
            </div>
        </template>

        <div class="uk-form-row">
            <label for="form-class" class="uk-form-label">{{ 'HTML Class' | trans }}</label>
            <div class="uk-form-controls">
                <input id="form-class" class="uk-form-width-large" type="text" v-model="node.theme.html_class">
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Sidebar' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.sidebar_first"> {{ 'Show the sidebar before the content.' | trans }}</label>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label">Hero {{ 'Position' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="node.theme.hero_viewport"> {{ 'Full viewport height' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <select id="form-hero-style" class="uk-form-width-large" v-model="node.theme.hero_style">
                        <option value="uk-block-default">{{ 'Default' | trans }}</option>
                        <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                        <option value="uk-block-primary">{{ 'Primary' | trans }}</option>
                        <option value="uk-block-secondary">{{ 'Secondary' | trans }}</option>
                    </select>
                </p>
                <p class="uk-form-help-block">{{ 'Select the background color.' | trans }}</p>
                <p class="uk-form-controls-condensed">
                    <select id="form-hero-blend" class="uk-form-width-large" v-model="node.theme.hero_blend">
                        <option value="">{{ 'None' | trans }}</option>
                        <option value="multiply">{{ 'Multiply' | trans }}</option>
                        <option value="screen">{{ 'Screen' | trans }}</option>
                        <option value="overlay">{{ 'Overlay' | trans }}</option>
                        <option value="darken">{{ 'Darken' | trans }}</option>
                        <option value="lighten">{{ 'Lighten' | trans }}</option>
                        <option value="color-dodge">{{ 'Color Dodge' | trans }}</option>
                        <option value="color-burn">{{ 'Color Burn' | trans }}</option>
                        <option value="hard-light">{{ 'Hard Light' | trans }}</option>
                        <option value="soft-light">{{ 'Soft Light' | trans }}</option>
                        <option value="difference">{{ 'Difference' | trans }}</option>
                        <option value="exclusion">{{ 'Exclusion' | trans }}</option>
                        <option value="hue">{{ 'Hue' | trans }}</option>
                        <option value="saturation">{{ 'Saturation' | trans }}</option>
                        <option value="color">{{ 'Color' | trans }}</option>
                        <option value="luminosity">{{ 'Luminosity' | trans }}</option>
                    </select>
                </p>
                <p class="uk-form-help-block">{{ 'Select a background blend mode.' | trans }}</p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="node.theme.hero_contrast"> {{ 'Invert colors' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed uk-margin-bottom">
                    <label><input type="checkbox" v-model="node.theme.hero_parallax"> {{ 'Enable parallax effect' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed uk-form-width-large"><input-image :source.sync="node.theme.hero_image"></input-image></p>
                <p class="uk-form-help-block">{{ 'Select a background image for the hero position.' | trans }}</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-navbar-layout" class="uk-form-label">{{ 'Navbar Layout' | trans }}</label>
            <div class="uk-form-controls">
               <select id="form-navbar-layout" class="uk-form-width-large" v-model="node.theme.header_layout">
                   <option value="default">{{ 'Single' | trans }}</option>
                   <option value="centered">{{ 'Centered' | trans }}</option>
               </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-navbar-mode" class="uk-form-label">{{ 'Navbar Mode' | trans }}</label>
            <div class="uk-form-controls">
              <select id="form-navbar-mode" class="uk-form-width-large" v-model="node.theme.header_sticky">
                  <option value="">{{ 'None' | trans }}</option>
                  <option value="sticky">{{ 'Sticky' | trans }}</option>
                  <option value="animated">{{ 'Sticky and animated' | trans }}</option>
              </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-footer-layout" class="uk-form-label">{{ 'Footer' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-footer-layout" class="uk-form-width-large" v-model="node.theme.footer_layout">
                    <option value="default">{{ 'Single' | trans }}</option>
                    <option value="centered">{{ 'Centered' | trans }}</option>
                </select>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="node.theme.footer_fixed"> {{ 'Fixed Footer' | trans }}</label>
                </p>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'To-top Scroller' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.totop_scroller"> {{ 'Enable a to-top scroller.' | trans }}</label>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-top-style" class="uk-form-label">Top A {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-top-style" class="uk-form-width-large" v-model="node.theme.top_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-top-b-style" class="uk-form-label">Top B {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-top-b-style" class="uk-form-width-large" v-model="node.theme.top_b_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-top-c-style" class="uk-form-label">Top C {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-top-c-style" class="uk-form-width-large" v-model="node.theme.top_c_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-top-d-style" class="uk-form-label">Top D {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-top-d-style" class="uk-form-width-large" v-model="node.theme.top_d_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-main-style" class="uk-form-label">Main {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-main-style" class="uk-form-width-large" v-model="node.theme.main_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-bottom-style" class="uk-form-label">Bottom A {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-bottom-style" class="uk-form-width-large" v-model="node.theme.bottom_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-bottom-b-style" class="uk-form-label">Bottom B {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-bottom-b-style" class="uk-form-width-large" v-model="node.theme.bottom_b_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-bottom-c-style" class="uk-form-label">Bottom C {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-bottom-c-style" class="uk-form-width-large" v-model="node.theme.bottom_c_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-bottom-d-style" class="uk-form-label">Bottom D {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-bottom-d-style" class="uk-form-width-large" v-model="node.theme.bottom_d_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-footer-style" class="uk-form-label">Footer {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-footer-style" class="uk-form-width-large" v-model="node.theme.footer_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                    <option value="uk-block-primary uk-contrast">{{ 'Primary' | trans }}</option>
                    <option value="uk-block-secondary uk-contrast">{{ 'Secondary' | trans }}</option>
                </select>
                <p class="uk-form-help-block uk-margin">{{ 'Note: Position settings only work if you publish a widget in that position.' | trans }}</p>
            </div>
        </div>

    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            priority: 90
        },

        props: ['node']

    };

    window.Site.components['node-theme'] = module.exports;

</script>
