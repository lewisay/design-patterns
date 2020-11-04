## 依赖倒置原则（Dependence Inversion Principle)

### 定义

> High-level modules should not depend on low-level modules. Both should depend on abstractions (高层模块不应该依赖底层模块，二者都应该依赖抽象）。

> Abstractions should not depend on details. Details (concrete implementations) should depend on abstractions（抽象不应该依赖细节，细节应该依赖抽象）。

### 最佳实践

1. 依赖倒置原则的中心思想是面向接口编程。
2. 依赖倒转原则是基于这样的设计理念：相对于细节的多变性，抽象的东西要稳定的多；以抽象为基础搭建的架构比以细节为基础的架构要稳定的多。
3. 使用接口或抽象类的目的是制定好规范，而不涉及任何具体的操作，把展现细节的任务交给他们的实现类去完成。