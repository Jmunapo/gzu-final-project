// Added font-awesome as custom script

// this is a custom dictionary to make it easy to extend/override
// provide a name for an entry, it can be anything such as 'copyAssets' or 'copyFonts'
// then provide an object with a `src` array of globs and a `dest` string
const existingConfig = require('@ionic/app-scripts/config/copy.config');
module.exports = Object.assign(existingConfig, {
  copyFontawesomeFonts: {
    src: ['{{ROOT}}/custom_css/fonts/**/*'],
    dest: '{{WWW}}/assets/fonts'
  },
  copyFontawesomeCss: {
    src: ['{{ROOT}}/custom_css/css/*.css'],
    dest: '{{WWW}}/assets/css'
  },
}
);