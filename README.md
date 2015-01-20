# How Secure Is My Password?
## WordPress Plugin

Replaces the WordPress password strength meter on the Profile page with the *How Secure Is My Password?* strength meter.

# Usage

Copy the `how-secure-is-my-password` directory into `wp-content/plugins` and then activate the plugin on the Plugins page in the WordPress admin section.

# Development

## Environment
Use Vagrant to start a development VM:

```shell
vagrant up
```

The provisioning script will install the latest version of WordPress and set up the DB as well as creating a symbolic link from the `how-secure-is-my-password` directory to the `wp-content/plugins` directory.

## Building

You will need to install the NPM dependencies first:

```shell
npm install
```

You can then run `make` to build a new version of the files after making any changes to `src/hsimp.wordpres.js` or `build/how-secure-is-my-password.php`.

You can also run `sh watch` in the root directory to automatically build the files when you make any changes.

# License

The MIT License (MIT)

Copyright (c) 2015, Mark Nicholas Wales / Small Hadron Collider

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.