import pylab

x_list = pylab.arange(-20.0,20.0, 0.1)
y_list = []

pylab.xlabel("x")

j = 0

class quadratic():
    def __init__(self, a_range,b_range,c_range):
        self.a_range = range(-a_range, a_range+1)
        self.b_range = range(-b_range, b_range+1)
        self.c_range = range(-c_range, c_range+1)
    
    def evaluate(self, x):
        self.y_values = []
        for a in range(0,len(self.a_range)):
            for b in range(0,len(self.b_range)):
                for c in range(0,len(self.c_range)):
                    self.y_values.append([a*(x**2),b*x,c])
        return self.y_values


quadratic = quadratic(5,5,5)
functions = quadratic.evaluate(1)
fig_list = range(1, len(functions)+1)

for i in functions:
    for x in x_list:
        y = i[0]*(x**2)+i[1]*x+i[2]
        y_list.append(y)
    label = str(i[0])+"x^2+"+str(i[1])+"x+"+str(i[2])
    fig_location = 'quadratics/Fig'+str(fig_list[j])+'.png'
    pylab.ylabel(label)
    pylab.plot(x_list,y_list)
    pylab.savefig(fig_location)
    pylab.clf()
    y_list = []
    j += 1
