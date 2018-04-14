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

On Unix-like systems such as macOS and Linux the change of %PATH depends on the operating system. Please refer your operating system documentation.

You maybe have to reboot your computer to make the changes persistent.

## Content

The SimpleInstall v2 Packaging Tools contains these components

**mk-sin-package.py** - An util to build SimpleInstall v2 packages

**sin2to1.py** converts a SimpleInstall v2 package to a SimpleInstall v1 package which is basically a *.tar.gz file without metadata

**sinextract.py** extracts the content of a SimpleInstall v2 package.

**count-lines.sh**
Counts the lines of code by programming language in current folder

**example** An example packaging project