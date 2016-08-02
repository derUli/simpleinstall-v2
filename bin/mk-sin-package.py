#!/usr/bin/env python2
import tarfile
import os
import shutil
import sys
import json
import base64
import hashlib

def make_tarfile(output_filename, source_dir):
    with tarfile.open(output_filename, "w:gz") as tar:
        tar.add(source_dir, arcname=os.path.basename(source_dir))


def sha1OfFile(filepath):
    with open(filepath, 'rb') as f:
        return hashlib.sha1(f.read()).hexdigest()

current_dir = os.getcwd()
build_json = os.path.join(current_dir, "build.json")
license_file = os.path.join(current_dir, "license.txt")
description_file = os.path.join(current_dir, "description.txt")
folder_src = os.path.join(current_dir, "src")
folder_dist = os.path.join(current_dir, "dist")
work_dir = os.path.join(current_dir, "work")
tar_gz_file = os.path.join(work_dir, "package.tar.gz")

if not os.path.exists(build_json):
    print("build.json not found!")
    sys.exit(1)

if not os.path.exists(folder_src):
    print("src folder not found!")
    sys.exit(2)
    
if os.path.exists(work_dir):
    shutil.rmtree(work_dir)

if not os.path.exists(work_dir):
    os.makedirs(work_dir)

json_data = open(build_json).read()
mjson = json.loads(json_data)
os.chdir("src")
pkgContent = []
print("get content list of " + mjson["id"] + "...")
for root, dirs, files in os.walk("."):
    for filename in files:
        p = os.path.join(root, filename)
        p = p.replace(".\\", "")
        p = p.replace("./", "")
        pkgContent.append(p)
tar = tarfile.open(tar_gz_file, 'w:gz')
for f in pkgContent:
    print("Adding " + f + "...")
    tar.add(f)
os.chdir("..")
tar.close()
checksum = sha1OfFile(tar_gz_file)
data = base64.b64encode(open(tar_gz_file, "rb").read())
mjson["data"] = data
mjson["checksum"] = checksum

if os.path.exists(license_file):
    mjson["license"] = open(license_file).read().strip()
    
if os.path.exists(description_file):
    mjson["description"] = open(description_file).read().strip()

if not os.path.exists(folder_dist):
    os.makedirs(folder_dist)

output_file = os.path.join(folder_dist, mjson["id"] + "-" + mjson["version"] + ".sin")

with open(output_file, "w") as handle:
    handle.write(json.dumps(mjson))
