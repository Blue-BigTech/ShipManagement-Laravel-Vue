const through = require('through2')
const { PluginError } = require('gulp-util')
const Path = require('path')
const Fs = require('fs')

let Types = {}
const PLUGIN_NAME = 'VWLimiter'

module.exports.limiter = function(types) {
  Types = types

  const transform = function(file, encoding, callback) {
    if (file.isNull()) {
      return callback(null, file)
    }

    if (file.isStream()) {
      this.emit('error', new PluginError(PLUGIN_NAME, 'Streams not supported!'))
    }

    if (file.isBuffer()) {
      let contents = String(file.contents)
      const filePath = file.path
      let before = ''
      const types = Types || ['max']
      const savePath = {
        max: `${Path.dirname(filePath)}/max/_${Path.basename(filePath)}`,
        min: `${Path.dirname(filePath)}/min/_${Path.basename(filePath)}`,
      }

      contents = contents.replace(/^(@import ")(include\/)/gm, '$1../$2')

      do {
        before = contents
        contents = contents.replace(/^(?!.*(@import "..\/|getVW\(| v\(|\{|\}|,)).*$/gm, '')
      } while (before != contents)

      do {
        before = contents
        contents = contents.replace(/^.*\{[\s\n]*\}/gm, '')
      } while (before != contents)

      do {
        before = contents
        contents = contents.replace(/(\r?\n){2,}/gm, '\n')
        contents = contents.replace(/^(\r?\n)/g, '')
      } while (before != contents)

      for (i in types) {
        let data = contents

        if (types[i] == 'max') {
          data = data.replace(/ getVW\(| v\(/g, ' getMax(')

          Fs.writeFile(savePath.max, data, function() {})
        } else if (types[i] == 'min') {
          data = data.replace(/ getVW\(| v\(/g, 'getMin(')

          Fs.writeFile(savePath.min, data, function() {})
        }
      }

      return callback(null, file)
    }

    this.push(file)
    callback()
  }

  return through.obj(transform)
}
