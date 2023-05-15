#!/usr/bin/env python3
import sys
import json
import os
import base64
import tarfile


def usage():
    print("Usage:")
    print("sinextract.py [filename]")
    print("")
    print("Extracts data from a SimpleInstall v2 (*.sin) package")
    sys.exit()


def extract_file(path, to_directory="."):
    if path.endswith(".zip"):
        opener, mode = zipfile.ZipFile, "r"
    elif path.endswith(".tar.gz") or path.endswith(".tgz"):
        opener, mode = tarfile.open, "r:gz"
    elif path.endswith(".tar.bz2") or path.endswith(".tbz"):
        opener, mode = tarfile.open, "r:bz2"
    else:
        raise ValueError(
            "Could not extract " + path + " as no appropriate extractor is found"
        )

    cwd = os.getcwd()
    os.chdir(to_directory)

    try:
        file = opener(path, mode)
        try:
            file.extractall()
        finally:
            file.close()
    finally:
        os.chdir(cwd)


if len(sys.argv) < 2:
    usage()

filename = os.path.abspath(sys.argv[1])
outputFile = os.path.splitext(filename)[0] + ".tar.gz"
os.path.splitext("path_to_file")[0]
if not os.path.exists(filename):
    print("file " + filename + " not found!")
    sys.exit(1)

with open(filename) as importFile:
    atrributes = json.load(importFile)
    data = atrributes["data"]
    data = base64.b64decode(data)
    with open(outputFile, "wb") as exportFile:
        exportFile.write(data)
    extractTargetDir = os.path.join(
        os.path.dirname(filename), atrributes["id"] + "-" + atrributes["version"]
    )
    if not os.path.exists(extractTargetDir):
        os.makedirs(extractTargetDir)

    extract_file(outputFile, extractTargetDir)
    os.remove(outputFile)
