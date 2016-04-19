/*
 * ----------------------------------------------------------------
 *  WossThemes TinyMCE Quick Shortcodes Button
 * ----------------------------------------------------------------
 */

(function() {
    // Load plugin specific language pack

    tinymce.create('tinymce.plugins.vntdtinymce', {


        init : function(ed, url) {

            woss_url = url;

            ed.addButton('woss_shortcodes_button', {
                type: 'splitbutton',
                title : 'Add Custom Shortcode',
                tooltip: 'Quick Shortcodes',
                cmd : 'mcepshortcodes',
                onclick: function() {
                    ed.insertContent('Main button');
                },
                menu: [

                    {
                        text: 'Columns',
                        menu: [
                            {
                                text: 'Column 1/2 + 1/2',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/2"]<br/><br/>[/vc_column]<br/>[vc_column width="1/2"]<br/><br/>[/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/3 + 2/3',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/3"][/vc_column][vc_column width="2/3"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 2/3 + 1/3',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="2/3"][/vc_column][vc_column width="1/3"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/3 + 1/3 + 1/3',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/3"][/vc_column][vc_column width="1/3"][/vc_column][vc_column width="1/3"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/4 + 1/4 + 1/4 + 1/4',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/4"][/vc_column][vc_column width="1/4"][/vc_column][vc_column width="1/4"][/vc_column][vc_column width="1/4"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/4 + 3/4',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/4"][/vc_column][vc_column width="3/4"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 3/4 + 1/4',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="3/4"][/vc_column][vc_column width="1/4"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/4 + 1/2 + 1/4',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/4"][/vc_column][vc_column width="1/2"][/vc_column][vc_column width="1/4"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 5/6 + 1/6',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="5/6"][/vc_column][vc_column width="1/6"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/6 + 5/6',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/6"][/vc_column][vc_column width="5/6"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/6"][/vc_column][vc_column width="1/6"][/vc_column][vc_column width="1/6"][/vc_column][vc_column width="1/6"][/vc_column][vc_column width="1/6"][/vc_column][vc_column width="1/6"][/vc_column]');
                                }
                            },
                            {
                                text: 'Column 1/6 + 2/3 + 1/6',
                                onclick: function(){
                                    ed.insertContent('[vc_column width="1/6"][/vc_column][vc_column width="2/3"][/vc_column][vc_column width="1/6"][/vc_column]');
                                }
                            },
                        ]

                    },

					{
                        text: 'Row\'s',
                        menu: [
                            {
                                text: 'White background',
                                onclick: function(){
                                    ed.insertContent('[vc_row th_section_padding="default" th_full_width="stretch_content" bg_section_color="white"]<br/><br/>[/vc_row]');
                                }
                            },
                            {
                                text: 'Grey background',
                                onclick: function(){
                                    ed.insertContent('[vc_row th_section_padding="default" th_full_width="stretch_content" bg_section_color="grey"]<br/><br/>[/vc_row]');
                                }
                            },
							{
                                text: 'Black background',
                                onclick: function(){
                                    ed.insertContent('[vc_row th_section_padding="default" th_full_width="stretch_content" bg_section_color="black"]<br/><br/>[/vc_row]');
                                }
                            },
							{
                                text: 'Grey background without spaces',
                                onclick: function(){
                                    ed.insertContent('[vc_row th_section_padding="default" th_full_width="content_no_spaces" bg_section_color="grey"]<br/><br/>[/vc_row]');
                                }
                            },
                        ]

                    },

                    {
                        text: 'Buttons',
                        menu: [
                            {
                                text: 'Black Button',
                                onclick: function(){
                                    ed.insertContent('[button type="btn-black" label="Text on the button" target="_self" align="left" url="#"]');
                                }
                            },
                            {
                                text: 'Pink Button',
                                onclick: function(){
                                    ed.insertContent('[button type="btn-pink" label="Text on the button" target="_self" align="left" url="#"]');
                                }
                            },
                        ]

                    },

                    {
                        text: 'Separators',
                        menu: [
                            {
                                text: 'White Space',
                                onclick: function(){
                                    ed.insertContent('[vc_empty_space height="32px"]');
                                }
                            },
                        ]

                    },


                    {
                        text: 'Progress Bars',
                        menu: [
                            {
                                text: 'Simple color',
                                onclick: function(){
                                    ed.insertContent('[vc_progress_bar values="90|Development,80|Design,70|Marketing" bgcolor="bar_turquoise"]');
                                }
                            },
                            {
                                text: 'Striped, animated',
                                onclick: function(){
                                    ed.insertContent('[vc_progress_bar values="90|Development,80|Design,70|Marketing" bgcolor="bar_turquoise" options="striped,animated"]');
                                }
                            }
                        ]

                    },
					
					{
                        text: 'Icon box',
                        menu: [
                            {
                                text: 'Style 1',
                                onclick: function(){
                                    ed.insertContent('[icon_box th_icon_type="style1" type="elegant" icon_elegant="vc_th icon-laptop" title="Icon Box" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,"]');
                                }
                            },
                            {
                                text: 'Style 2',
                                onclick: function(){
                                    ed.insertContent('[icon_box th_icon_type="style2" type="elegant" icon_elegant="vc_th icon-laptop" title="Icon Box" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,"]');
                                }
                            },
							{
                                text: 'Style 3',
                                onclick: function(){
                                    ed.insertContent('[icon_box th_icon_type="style3" type="elegant" icon_elegant="vc_th icon-laptop" title="Icon Box" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,"]');
                                }
                            },
                        ]

                    },
					
					/* {
                        text: 'Testimonials',
                        menu: [
                            {
                                text: 'Testimonials Carousel',
                                onclick: function(){
                                    ed.insertContent('[testimonials posts_nr="7"]');
                                }
                            },
                        ]

                    } */
					
					{
                        text: 'Counter',
                        menu: [
                            {
                                text: 'Simple counter',
                                onclick: function(){
                                    ed.insertContent('[counter title="Projects" number="1000"]');
                                }
                            },
                        ]

                    }
					
                ],
                image :url+'/shortcodes.png'
            });

            ed.addMenuItem('insertValueOfMyNewDropdown', {
                icon: 'date',
                text: 'Do something with this new dropdown',

                context: 'insert'
            });

        },

        getInfo : function() {
            return {
                longname : 'woss_shortcodes_button',
                author : 'WossThemes',
                authorurl : 'http://themeforest.net/user/WossThemes/',
                infourl : 'http://www.tinymce.com/',
                version : "1.0"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('woss_shortcodes_button', tinymce.plugins.vntdtinymce);
})();