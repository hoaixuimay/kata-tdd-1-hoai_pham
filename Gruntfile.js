module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    phpunit:{
        classes: {
            dir: 'tests/'
        },
        options: {
            bin: 'vendor/bin/phpunit',
            colors: true,
            bootstrap: 'vendor/autoload.php'
        }
    }
  });

  // Load the plugin that provides the "phpunit" task.
  grunt.loadNpmTasks('grunt-phpunit');

  // Default task(s).
  grunt.registerTask('default', ['phpunit']);

};