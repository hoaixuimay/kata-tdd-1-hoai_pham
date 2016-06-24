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
    },
    
    karma: {
        unit: {
            configFile: 'karma.conf.js',
            autoWatch: true
        }
    }
  });

  // Load the plugin that provides the "phpunit" task.
  grunt.loadNpmTasks('grunt-phpunit');

  // Karma
  grunt.loadNpmTasks('grunt-karma');

  // Default task(s).
  grunt.registerTask('default', ['phpunit','karma']);
  
  // Distributed task(s).
  grunt.registerTask('test', ['phpunit','karma']);
  
  // Distributed task(s).
  grunt.registerTask('dist', ['phpunit','karma']);

};