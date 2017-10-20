#!/usr/bin/env python2
import sys
import json
import os

def usage():
    print("todo print usage")
    sys.exit()

if len(sys.argv) < 2:
    usage()

filename = os.path.abspath(sys.argv[1])
if not os.path.exists(filename):
    print("file " + filename + " not found!")
    sys.exit(1)

with open(filename) as data_file:
    data = json.load(data_file)
