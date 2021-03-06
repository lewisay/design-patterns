## 工厂模式

### 简单工厂模式
- 简单工厂模式是属于创建型模式，是工厂模式的一种。简单工厂模式是由一个工厂对象决定创建出哪一种产品类的实例。
- 简单工厂模式：定义了一个创建对象的类，由这个类来封装实例化对象的行为。
- 在软件开发中，当我们会用到大量的创建某种、某类或者某批对象时，就会使用到工厂模式。

### 工厂方法模式
- 定义了一个创建对象的抽象方法，由子类决定要实例化的类。工厂方法模式将对象的实例化推迟到子类。

### 抽象工厂模式
- 抽象工厂模式：定义了一个interface用于创建相关或有依赖关系的对象簇，而无需指明具体的类。
- 抽象工厂模式可以将简单工厂模式和工厂方法模式进行整合。
- 从设计层面看，抽象工厂模式就是对简单工厂模式的改进。
- 将工厂抽象成两层，AbsFactory(抽象工厂) 和 具体实现的工厂子类。程序员可以根据创建对象类型使用对应的工厂子类。这样将单个的简单工厂类变成了工厂簇，更利于代码的维护和扩展。

### 工厂模式的注意事项
1. 将实例化对象的代码提取出来，放到一个类中统一管理和维护，达到和主项目的依赖关系的解耦。从而提高项目的扩展和维护性。
2. 设计模式的依赖抽象原则
    - 创建对象实例时，不要直接 new 类, 而是把这个 new 类的动作放在一个工厂的方法中，并返回
    - 不要让类继承具体类，而是继承抽象类或者是实现 interface(接口)。
    - 不要覆盖基类中已经实现的方法。