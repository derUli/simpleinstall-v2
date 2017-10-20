#!/usr/bin/env python2
import sys
import json
import os
import base64

def usage():
    print("sin2to1.py - Converts a SimpleInstall version 2 package to a SimpleInstall version 1 package")
    print("")
    print("Usage:")
    print("sin2to1.py [filename]")
    sys.exit()

if len(sys.argv) < 2:
    usage()

filename = os.path.abspath(sys.argv[1])
outputFile = os.path.splitext(filename)[0] + ".tar.gz"
os.path.splitext("path_to_file")[0]
if not os.path.exists(filename):
    print("file " + filename + " not found!")
    sys.exit(1)

with open(filename) as importFile:
    data = json.load(importFile)
    data = data["data"]
    data = base64.b64decode(data)
    with open(outputFile, 'wb') as exportFile:
        exportFile.write(data)
