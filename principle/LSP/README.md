## 里氏替换原则（Liskov Substitution Principle）

### 定义

> if for each object o1 of type S there is an object o2 of type T such that for all programs P defined in terms of T, the behavior of P is unchanged when o1 is substituted for o2 then S is a subtype of T（如果对于每一个类型为S的对象o1，都有类型为T的对象o2，使得以T定义的所有程序P在所有的对象o1都换为o2时，程序的行为没有发生变化，那么S是T的子类型）。

> functions that use pointers or references to base classes must be able to use objects of derived classes without knowing it（所有引用基类的地方必须能透明的使用其子类的对象）。

### 动机

使用继承有很多优点,可以提高代码的重用性，提高可扩展性、开放性，但是不可否认，继承也是有缺点的：

- 继承是侵入性的，只要继承，就必须拥有父类的所有属性和方法。
- 增强了耦合性，如果一个类被其他的类所继承，则当这个类需要修改时，必须考虑到所有的子类，并且父类修改后，所有涉及到子类的功能都有可能产生故障。
- 降低代码的灵活性。

### 里氏替换原则

- 子类必须实现父类的抽象方法，但不得重写（覆盖）父类的非抽象（已实现）方法。
- 子类中可以增加自己特有的方法。
- 覆盖或者实现父类的方法时输入参数可以被放大。
- 覆盖或者实现父类的方法时输出结果可以被缩小。

### 最佳实践

继承实际上让两个类耦合性增强了，在适当的情况下，可以通过聚合，组合，依赖来解决问题。