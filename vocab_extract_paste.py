# -*- coding: utf8 -*-
from Tkinter import Tk
import sys

source_text = "undefined"

def main(source_text):
	for term in source_text.split("--AzXn--"):
		term = term.strip()
		if term != "":
			copy(term)
			b = raw_input("Press enter to copy next term")

def copy(text):
	r.clipboard_clear()
	r.clipboard_append(text)
	print "copied ",text.partition("\n")[0]

run = True
if len(sys.argv) == 2:
	try:
		source_text = open(sys.argv[1], 'r').read()
	except Exception, e:
		raise
else:
	if source_text == "undefined":
		print "Incorrect number of arguments"
		run = False

if run:
	r = Tk()
	r.withdraw()
	main(source_text)
	print "No terms to copy"
	r.destroy()