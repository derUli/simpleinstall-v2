# simpleinstall-v2

SimpleInstall v2 Packaging Tools

## Description

Simple Install v2 is the official package format of [UliCMS](https://en.ulicms.de).
It contains utils to build and manipulate package files in the *.sin format.

The SimpleInstall v2 Packaging Tools enables you to redistribute custom developed modules and themes for general usage.

## Requirements
 
In order to use all of the supplied tool this requirements must be installed

### Required Software

* Python 2.7 or newer
* Python argparse modul (should be included in most  python distributions)
* Bash

### Required Hard Skills
* How to use the Command line
* JSON 

## Setup
Copy the "bin" folder to a public place where all users have access.
Add the path of the copied folder to your $PATH environment variable.

[Set Path in Windows](https://www.computerhope.com/issues/ch000549.htm)

On Unix-like systems such as macOS and Linux the change of %PATH depends on the operating system. Please refer your vendor's operating system documentation.

You maybe have to reboot your computer to make the changes persistent.

## Content

The SimpleInstall v2 Packaging Tools contains these components

**mk-sin-package.py** - An util to build SimpleInstall v2 packages

**sin2to1.py** converts a SimpleInstall v2 package to a SimpleInstall v1 package which is basically a *.tar.gz file without metadata

**sinextract.py** extracts the content of a SimpleInstall v2 package.

**count-lines.sh**
Counts the lines of code by programming language in current folder

**example** An example packaging project

## Usage

### Build a package

mk-sin-package.py builds a package.
It needs a folder `src` containing all files of the module or theme and a `build.json` file containing metadata.

Please verify that only the required files are included.
Don't include files of other components in your `src` folder.

An example packaging project is located in the `example` folder.

To build a package you have to open a terminal `cd` to the folder which contains the `build.json` file and then run `mk-sin-package.py`.
The package will be built in the `dist/` folder

#### Screenshot

A screenshot can be included.
Just add an image as screenshot.jpg in the same folder as the `build.json` is located.

#### License

You can place a file `LICENSE` containing a license agreement in the same folder as the `build.json` is located.

#### build.json attributes

The following attributes are supported:

**id** An unique identifier which is used as name for the package

**version** Version number

**description** A short description of the package

**categories** Categories / Tags

**dependencies** Modules which must be installed before the package can be installed

**compatible_from** Minium required UliCMS version

**compatible_to** Maximum required UliCMS version

### Convert a SimpleInstall package

`sin2to1.py` converts a SimpleInstall v2 (*.sin) package to a SimpleInstall v1 (*.tar.gz) package.

**Example usage:**

```
$ sin2to1.py my_package-1.0.sin
```

Results in a file my_package-1.0.tar.gz in the same folder.

### Extract data from a SimpleInstall v2 package

Extracts the data from a SimpleInstall v2 package
 
**Example usage:**

```
$ sinextract.py my_package-1.0.sin
```

This commands results in a folder named `my_package-1.0` in the same folder.

### Count lines of code

The bash shell script `count-lines.sh` counts the lines of code by language in the current folder and it's subfolders.

**Example output**

```
$ count-lines.sh
Lines of php Code:
169584
Lines of js Code:
103706
Lines of css Code:
66208
Lines of py Code:
0
```
 
